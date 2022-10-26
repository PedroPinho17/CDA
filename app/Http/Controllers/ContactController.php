<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validate ;
use Mail;
use Alert;
class ContactController extends Controller
{
    //
    public function send(Request $request){
        $regras = [
        'nome' => 'required',
        'email' => 'required|email',
        'assunto' => 'required',
        'mensagem' => 'required'];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido'
        ];
        $request->validate($regras, $feedback);

        if($this->isOnline()){
            $mail_data = [
                'recipient' => 'clubedesportivoarrifanense1922@gmail.com',
                'fromEmail' => $request->email,
                'fromName' => $request->nome,
                'subject' => $request->assunto,
                'body' => $request->mensagem
            ];
            \Mail::send('email-template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });
            // Alert::success('Email enviado com sucesso!', 'Sucesso!');
            return redirect()->back()->with('success', 'Email enviado com sucesso!');
        }else{
            return redirect()->back()->withInput()->with('error' , 'Verifique sua ligação a internet!');
        }

    }

    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site,'r')){
            return true;
        }else{
            return false;
        }

    }
}
