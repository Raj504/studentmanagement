<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = Payment::find($pid);
        $pdf = App::make('dompdf.wrapper');

        // Define HTML content with enhanced styling
        $print = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                .container {
                    margin: 20px auto;
                    padding: 20px;
                    width: 90%;
                    max-width: 800px;
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border: 2px solid #007bff; /* Border around the container */
                }
                h1 {
                    text-align: center;
                    color: #007bff; /* Heading color */
                    border-bottom: 2px solid #007bff; /* Bottom border for heading */
                    padding-bottom: 10px;
                }
                hr {
                    border: 1px solid #007bff; /* Blue border for horizontal rule */
                }
                p, span {
                    font-size: 14px;
                    color: #555;
                }
                b {
                    color: #333;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                }
                table, th, td {
                    border: 1px solid #ddd;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                }
                th {
                    background-color: #007bff; /* Blue background for table headers */
                    color: white;
                }
                td {
                    background-color: #f9f9f9;
                }
                .footer {
                    margin-top: 20px;
                    text-align: right;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Payment Receipt</h1>
                <hr/>
                <p>Receipt No: <b>{$pid}</b></p>
                <p>Date: <b>{$payment->paid_date}</b></p>
                <p>Enrollment No: <b>{$payment->enrollment->enroll_no}</b></p>
                <p>Student Name: <b>{$payment->enrollment->student->name}</b></p>
                <hr/>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h3>{$payment->enrollment->batch->name}</h3></td>
                            <td><h3>{$payment->amount}</h3></td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
                <div class='footer'>
                    <span>Printed By: <b>" . Auth::user()->name . "</b></span><br/>
                    <span>Printed Date: <b>" . date('Y-m-d') . "</b></span>
                </div>
            </div>
        </body>
        </html>
        ";

        $pdf->loadHTML($print);
        return $pdf->stream();
    }
}
?>
