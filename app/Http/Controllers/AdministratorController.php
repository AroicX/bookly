<?php

namespace App\Http\Controllers;

use Auth;
use App\Customer;
use App\Reservation;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    // staffs
    public function staffs()
    {
        $staffs = User::where('role', 'staff')->get();
        return view('admin.staffs.index', compact('staffs'));
    }

    public function createStaff(Request $request)
    {
        $staff = new User();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = bcrypt('password');
        $staff->save();

        $staffs = User::where('role', 'staff')->get();
        return redirect('admin/staffs/')->with('staffs');
    }

    // staffs

    // customers
    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function createCustomer(Request $request)
    {
        $customer = new Customer();
        $customer->customer_id = $this->generateID(9);
        $customer->fullname = $request->fullname;
        $customer->email = $request->email;
        $customer->number = $request->number;
        $customer->address = $request->address;
        $customer->nationality = $request->nationality;
        $customer->gender = $request->gender;
        $customer->save();

        $customers = Customer::all();
        return redirect('admin/customers/')->with('customers');
    }

    // customers

    public function rooms()
    {
        $rooms = Room::all();

        return view('admin.rooms.index', compact('rooms'));
    }

    //rooms

    //reservations

    public function reservations()
    {
        $reservations = Reservation::with('Customer', 'Room')->get();
        $rooms = Room::where('status', 'available')->get();
        $customers = Customer::all();

        return view(
            'admin.reservations.index',
            compact('reservations', 'rooms', 'customers')
        );
    }

    public function reservationsCreate(Request $request)
    {
        $found = Room::where('room_id', $request->room)->first();

        $payed = $found->price * $request->stay;

        $reservation = new Reservation();
        $reservation->staff_id = Auth::user();
        $reservation->reservation_id = $this->generateID(12);
        $reservation->customer_id = $request->customers;
        $reservation->room_id = $request->room;
        $reservation->payment_by = $request->payment;
        $reservation->arrival = $request->arrival;
        $reservation->departure = $request->departure;
        $reservation->stay = $request->stay;
        $reservation->amount = $payed;
        $reservation->save();

        $data = ['status' => 'booked'];
        Room::where('room_id', $request->room)->update($data);

        $reservations = Reservation::with('Customer', 'Room')->get();
        $rooms = Room::where('status', 'available')->get();
        $customers = Customer::all();

        return redirect('admin/reservations/')->with(
            'reservations',
            'rooms',
            'customers'
        );
    }

    public function updateReservations(Request $request)
    {
        // return $request->all();

        $getReservation = Reservation::where('id', $request->reservation_id)
            ->with('Customer', 'Room')
            ->first();

        $found = Room::where('room_id', $request->room)->first();
        Room::where('room_id', $getReservation->room->room_id)->update([
            'status' => 'available',
        ]);

        $payed = $found->price * $request->stay;

        $data = [
            'customer_id' => $request->customers,
            'room_id' => $request->room,
            'payment_by' => $request->payment,
            'arrival' => $request->arrival,
            'departure' => $request->departure,
            'stay' => $request->stay,
            'amount' => $payed,
        ];

        $getReservation->update($data);

        $data = ['status' => 'booked'];
        Room::where('room_id', $request->room)->update($data);

        $reservations = Reservation::with('Customer', 'Room')->get();
        $rooms = Room::where('status', 'available')->get();
        $customers = Customer::all();

        return redirect('admin/reservations/')->with(
            'reservations',
            'rooms',
            'customers'
        );
    }
    public function findReservations(Request $request)
    {
        $getReservation = Reservation::where('id', $request->reservation_id)
            ->with('Customer', 'Room')
            ->first();

        return $getReservation;
    }

    //reservations
}
