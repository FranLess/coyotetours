<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tour;
use App\Models\YoutubeVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $videos_youtube = YoutubeVideo::select('clave')->get();
        return view('index' , compact('videos_youtube'));
    }

    public function show(Tour $tour)
    {
        $images = Image::where('id_tour', $tour->id)->get();
        return view('tours.show', compact('tour', 'images'));
    }

    public function nosotros()
    {
        return view('nosotros.index');
    }

    public function contacto()
    {
        return view('contacto.show');
    }

    public function peticionReserva(Request $request)
    {
        $hoy = Carbon::yesterday();
        $validated = $request->validate([
            'nombre' => 'required',
            'numero_personas' => 'required|numeric',
            'email' => 'required|email',
            'fecha' => "required|date|after:$hoy",
            'tour' => 'required'
        ]);

        $this->sendEmail($request);
    }
    public function sendEmail($request)
    {
        function enviarmail($email1, $nombreremitente, $emailC, $asunto, $mensaje, $files)
            {
                $senderMail = "Coyotetoursvip@gmail.com";
                $origenMail = "Coyotetoursvip <Coyotetoursvip@gmail.com>";
    
                $origenMail = $nombreremitente . " " . $email1 . "";
    
                $headers = "From: $origenMail\r\n";
                $headers .= "Reply-To: $email1\r\n";
                $headers .= "Return-Path: $origenMail\r\n";
                $headers .= "Organization: Von Glumer\r\n";
                $headers .= "X-Priority: 3\r\n";
                $headers .= "X-Mailer: PHP" . phpversion();
                // boundary 
                $semi_rand = md5(time());
                $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    
                // headers for attachment     
                $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
    
                // multipart boundary 
                $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $mensaje . "\n\n";
    
                // preparing attachments	
                if ($files != "") {
                    if (count($files) > 0) {
                        for ($i = 0; $i < count($files); $i++) {
                            if (is_file($files[$i])) {
                                $message .= "--{$mime_boundary}\n";
                                $fp =    @fopen($files[$i], "rb");
                                $data =  @fread($fp, filesize($files[$i]));
    
                                @fclose($fp);
                                $data = chunk_split(base64_encode($data));
                                $message .= "Content-Type: application/octet-stream; name=\"" . basename($files[$i]) . "\"\n" .
                                    "Content-Description: " . basename($files[$i]) . "\n" .
                                    "Content-Disposition: attachment;\n" . " filename=\"" . basename($files[$i]) . "\"; size=" . filesize($files[$i]) . ";\n" .
                                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                            }
                        }
                    }
                }
                $message .= "--{$mime_boundary}--";
                $returnpath = "-f" . $origenMail;
    
                //send email
                $email1 = "durangoadvisor@yahoo.com.mx";
                $email2 = "miguel1234ftgt@gmail.com";
    
                $remitentes = $email2;
    
                #$remitentes = "miguel123ftgt@gmail.com";
    
                $mail = @mail($remitentes, $asunto, $message, $headers, $returnpath);
    
                if (!$mail){
                    $error = error_get_last();
                    echo "<br>ERROR en el Mail: <br>";
                } 
                else echo "Tu correo se ha enviado satisfactoriamente<br>";
            }
    
    
            $nombre = $request->nombre;
            $telefono = $request->fecha;
            $email = $request->email;
            $mensaje = $request->tour;
            $numeroPersonas = $request->numero_personas;
    
    
    
            $mensajeenviar = "Correo enviado desde el portal web de Coyotetoursvip.\n
            $nombre está interesad@ en reservar el TOUR: $mensaje\n
            Personas: $numeroPersonas\n
            Fecha: $telefono \n
            \n
            (fecha en formato mes/dia/año)
            ";
            enviarmail($email, $nombre, "", "Correo del Portal de Coyotetoursvip.com", $mensajeenviar, "");
    }
}
