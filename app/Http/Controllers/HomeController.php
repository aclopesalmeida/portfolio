<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\App;


class HomeController extends Controller
{

    public function index() 
    {
        return view('home.index');
    }

    public function language(Request $request)
    {
        if(!is_null($request->input('lang'))) {
            $cookie = Cookie::make('locale_lang', $request->input('lang'), 360);
            return response()->make()->withCookie($cookie);
        }
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:2',
            'email' => 'email|required',
            'message' => 'required'
        ]);

        if($validator->fails()) {
            return ['errors' => $validator->errors(), 'locale' => App::getLocale()];
            return ['errors' => $validator->errors()];
        }

        $status = true;
        $tentativas = 5;
        while($status == true)
        {
             try {
                Mail::to('geral@acla-portfolio.com')
                         ->send(new ContactForm($request));
            }
            catch (Exception $e)
            {
              if($tentativas > 0)
                {
                    $tentativas--;
                }
                else {
                    $status = false;
                    return $e;
                }

          }

        }
        return ['msg' => 'sucesso'];

    }
}
