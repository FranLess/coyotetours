<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Custom\PDF_Code128;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Codedge\Fpdf\Fpdf\Fpdf;



class VentasController extends Controller
{
    public function showVenta($id)
    {
        # Incluyendo librerias necesarias #

        $user = Auth::user();
        if ($user) {
            $venta = Venta::where(['venta_id' => $id, 'usuario_email' => Auth::user()->email])->first();
        } else {
            return abort(404);
        }
        if (!$venta) {
            return abort(404);
        }

        $pdf = new Fpdf('P', 'mm', 'Letter');
        $pdf->SetMargins(17, 17, 17);
        $pdf->AddPage();

        # Logo de la empresa formato png #
        $pdf->Image(asset('img/coyoteLogo.png'), 165, 12, 35, 35, 'PNG');

        # Encabezado y datos de la empresa #
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(32, 100, 210);
        $pdf->Cell(150, 10, utf8_decode(strtoupper(env('APP_NAME'))), 0, 0, 'L');

        $pdf->Ln(9);

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        // $pdf->Cell(150, 9, utf8_decode("RUC: 0000000000"), 0, 0, 'L');

        // $pdf->Ln(5);

        $pdf->Cell(150, 9, utf8_decode("Direccion: Calle Aldama #120, Durango, México"), 0, 0, 'L');

        $pdf->Ln(5);

        $pdf->Cell(150, 9, utf8_decode("Teléfono: +52 618 168 9923"), 0, 0, 'L');

        $pdf->Ln(5);

        $pdf->Cell(150, 9, utf8_decode("Email: ventas@coyotetoursvip.com"), 0, 0, 'L');

        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 7, utf8_decode("ID de compra:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(116, 7, utf8_decode($venta->venta_id));
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(39, 39, 51);

        $pdf->Ln(5);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 7, utf8_decode("Fecha de emisión:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(116, 7, utf8_decode(date("d/m/Y", strtotime("$venta->created_at"))));
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(35, 7, utf8_decode(strtoupper("Factura Nro. $venta->id")), 0, 0, 'C');

        $pdf->Ln(7);

        // $pdf->SetFont('Arial', '', 10);
        // $pdf->Cell(12, 7, utf8_decode("Cajero:"), 0, 0, 'L');
        // $pdf->SetTextColor(97, 97, 97);
        // $pdf->Cell(134, 7, utf8_decode("Carlos Alfaro"), 0, 0, 'L');
        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->SetTextColor(97, 97, 97);
        // $pdf->Cell(35, 7, utf8_decode(strtoupper("1")), 0, 0, 'C');

        // $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(13, 7, utf8_decode("Cliente:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(60, 7, utf8_decode($venta->usuario_email), 0, 0, 'L');
        // $pdf->SetTextColor(39, 39, 51);
        // $pdf->Cell(8, 7, utf8_decode("Doc: "), 0, 0, 'L');
        // $pdf->SetTextColor(97, 97, 97);
        // $pdf->Cell(60, 7, utf8_decode("DNI: 00000000"), 0, 0, 'L');
        // $pdf->SetTextColor(39, 39, 51);
        // $pdf->Cell(7, 7, utf8_decode("Tel:"), 0, 0, 'L');
        // $pdf->SetTextColor(97, 97, 97);
        // $pdf->Cell(35, 7, utf8_decode("00000000"), 0, 0);
        // $pdf->SetTextColor(39, 39, 51);

        // $pdf->Ln(7);

        // $pdf->SetTextColor(39, 39, 51);
        // $pdf->Cell(6, 7, utf8_decode("Dir:"), 0, 0);
        // $pdf->SetTextColor(97, 97, 97);
        // $pdf->Cell(109, 7, utf8_decode("San Salvador, El Salvador, Centro America"), 0, 0);

        $pdf->Ln(9);


        $pdf->SetFont('Arial', '', 8);
        $pdf->SetFillColor(23, 83, 201);
        $pdf->SetDrawColor(23, 83, 201);
        $pdf->SetTextColor(255, 255, 255);

        /*----------  Detalles de la tabla  ----------*/

        foreach (json_decode($venta->detalles_compra) as $item) {
            if ($item->categoria == 'tours') {
                # Tabla de productos #
                $pdf->SetTextColor(255, 255, 255);

                $pdf->Cell(90, 8, utf8_decode("Descripción"), 1, 0, 'C', true);
                $pdf->Cell(15, 8, utf8_decode("Adultos."), 1, 0, 'C', true);
                $pdf->Cell(15, 8, utf8_decode("Menores."), 1, 0, 'C', true);
                // $pdf->Cell(19, 8, utf8_decode("Precio Adulto"), 1, 0, 'C', true);
                // $pdf->Cell(19, 8, utf8_decode("Precio Menor"), 1, 0, 'C', true);
                $pdf->Cell(32, 8, utf8_decode("Subtotal"), 1, 0, 'C', true);

                $pdf->Ln(8);

                $pdf->SetTextColor(39, 39, 51);


                $pdf->Cell(90, 7, utf8_decode("$item->nombre_prod"), 'L', 0, 'C');
                $pdf->Cell(15, 7, utf8_decode("$item->adultos"), 'L', 0, 'C');
                $pdf->Cell(15, 7, utf8_decode("$item->menores"), 'L', 0, 'C');
                // $pdf->Cell(19, 7, utf8_decode("$item->precio_total"), 'L', 0, 'C');
                // $pdf->Cell(19, 7, utf8_decode("$0.00 USD"), 'L', 0, 'C');
                $pdf->Cell(32, 7, utf8_decode("$item->precio_total MXN"), 'LR', 0, 'C');
                $pdf->Ln(10);
            }
            if ($item->categoria == 'cabana') {
                # Tabla de productos #
                $pdf->SetTextColor(255, 255, 255);

                $pdf->Cell(90, 8, utf8_decode("Descripción"), 1, 0, 'C', true);
                $pdf->Cell(15, 8, utf8_decode("Adultos."), 1, 0, 'C', true);
                $pdf->Cell(15, 8, utf8_decode("Menores."), 1, 0, 'C', true);
                $pdf->Cell(25, 8, utf8_decode("Precio Adulto"), 1, 0, 'C', true);
                $pdf->Cell(19, 8, utf8_decode("Precio Menor"), 1, 0, 'C', true);
                $pdf->Cell(32, 8, utf8_decode("Subtotal"), 1, 0, 'C', true);

                $pdf->Ln(8);

                $pdf->SetTextColor(39, 39, 51);


                $pdf->Cell(90, 7, utf8_decode("$item->nombre_prod"), 'L', 0, 'C');
                $pdf->Cell(15, 7, utf8_decode("$item->adultos"), 'L', 0, 'C');
                $pdf->Cell(15, 7, utf8_decode("$item->menores"), 'L', 0, 'C');
                $pdf->Cell(25, 7, utf8_decode("$10 USD"), 'L', 0, 'C');
                $pdf->Cell(19, 7, utf8_decode("$0.00 USD"), 'L', 0, 'C');
                $pdf->Cell(32, 7, utf8_decode("$70.00 USD"), 'LR', 0, 'C');
                $pdf->Ln(7);
            }
            if ($item->categoria == 'restaurante') {
                # Tabla de productos #
                $pdf->SetTextColor(255, 255, 255);

                $pdf->Cell(90, 8, utf8_decode("Descripción"), 1, 0, 'C', true);
                $pdf->Cell(15, 8, utf8_decode("Adultos."), 1, 0, 'C', true);
                $pdf->Cell(15, 8, utf8_decode("Menores."), 1, 0, 'C', true);
                $pdf->Cell(25, 8, utf8_decode("Precio"), 1, 0, 'C', true);
                $pdf->Cell(19, 8, utf8_decode("Desc."), 1, 0, 'C', true);
                $pdf->Cell(32, 8, utf8_decode("Subtotal"), 1, 0, 'C', true);

                $pdf->Ln(8);


                $pdf->SetTextColor(39, 39, 51);


                $pdf->Cell(90, 7, utf8_decode("$item->nombre_prod"), 'L', 0, 'C');
                $pdf->Cell(15, 7, utf8_decode("$item->adultos"), 'L', 0, 'C');
                $pdf->Cell(15, 7, utf8_decode("$item->menores"), 'L', 0, 'C');
                $pdf->Cell(25, 7, utf8_decode("$10 USD"), 'L', 0, 'C');
                $pdf->Cell(19, 7, utf8_decode("$0.00 USD"), 'L', 0, 'C');
                $pdf->Cell(32, 7, utf8_decode("$70.00 USD"), 'LR', 0, 'C');
                $pdf->Ln(7);
            }
        }
        $pdf->SetTextColor(39, 39, 51);

        /*----------  Fin Detalles de la tabla  ----------*/

        $pdf->Ln(5);




        $pdf->SetFont('Arial', 'B', 9);

        # Impuestos & totales #
        // $pdf->Cell(100, 7, utf8_decode(''), 'T', 0, 'C');
        // $pdf->Cell(15, 7, utf8_decode(''), 'T', 0, 'C');
        // $pdf->Cell(32, 7, utf8_decode("SUBTOTAL"), 'T', 0, 'C');
        // $pdf->Cell(34, 7, utf8_decode("+ $70.00 USD"), 'T', 0, 'C');

        $pdf->Ln(7);

        // $pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
        // $pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
        // $pdf->Cell(32, 7, utf8_decode("IVA (13%)"), '', 0, 'C');
        // $pdf->Cell(34, 7, utf8_decode("+ $0.00 USD"), '', 0, 'C');

        $pdf->Ln(7);

        $pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
        $pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');


        $pdf->Cell(32, 7, utf8_decode("TOTAL A PAGAR"), 'T', 0, 'C');
        $pdf->Cell(34, 7, utf8_decode("$venta->pago_pendiente MXN"), 'T', 0, 'C');

        $pdf->Ln(7);

        $pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
        $pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
        $pdf->Cell(32, 7, utf8_decode("TOTAL PAGADO"), '', 0, 'C');
        $pdf->Cell(34, 7, utf8_decode("$venta->pagado MXN"), '', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
        // $pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
        // $pdf->Cell(32, 7, utf8_decode("CAMBIO"), '', 0, 'C');
        // $pdf->Cell(34, 7, utf8_decode("$30.00 USD"), '', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
        // $pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
        // $pdf->Cell(32, 7, utf8_decode("USTED AHORRA"), '', 0, 'C');
        // $pdf->Cell(34, 7, utf8_decode("$0.00 USD"), '', 0, 'C');

        $pdf->Ln(12);

        $pdf->SetFont('Arial', '', 9);

        $pdf->SetTextColor(39, 39, 51);
        $pdf->MultiCell(0, 9, utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);

        $pdf->Ln(9);

        # Codigo de barras #
        // $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
        // $pdf->SetXY(0,$pdf->GetY()+21);
        // $pdf->SetFont('Arial','',14);
        // $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

        # Nombre del archivo PDF #
        $pdf->Output("I", "Ticket_Nro_1.pdf", true);
        exit;
    }

    public function showCompra($id)
    {
        $user = Auth::user();
        if ($user) {
            $venta = Venta::where(['venta_id' => $id, 'usuario_email' => Auth::user()->email])->first();
        } else {
            return abort(404);
        }
        if (!$venta) {
            return abort(404);
        }
        return view('ventas.compra', compact('venta'));
    }

    public function compras()
    {
        $user = Auth::user();
        $ventas = Venta::where('usuario_email', $user->email)->get();
        return view('ventas.show', compact('ventas'));
    }
}
