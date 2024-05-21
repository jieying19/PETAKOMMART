<!-- resources/views/payment/report.blade.php -->

@extends('layouts.sideNav')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Day</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report as $entry)
                <tr>
                    <td>{{ $entry->day }}</td>
                    <td>{{ $entry->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection