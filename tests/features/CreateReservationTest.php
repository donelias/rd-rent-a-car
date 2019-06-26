<?php


use Carbon\Carbon;

class CreateReservationTest extends FeatureTestCase
{
    public function test_a_user_create_a_reservation()
    {
        //Having / lo que tenemos
        $no_reservation  = $this->noResrvation('1', '5');
        $date_in        = '2019-06-22';
        $date_out       = '2019-06-26';
        $price          = '';

        /*
         * user_id
         * car_id
         * status_id
         * payment_id
         */

        //crear usuario
        $user = $this->defaultUser();

        //Ususario Conectado
        $this->actingAs($user);

        //When / los eventos de la prueba
        $this->visit(route('reservations.create'))
            ->type($no_reservation, 'no_reservation')
            ->type($date_in, 'date_in')
            ->type($date_out, 'date_out')
            ->press('Reservar');


        // Then / resultado
        //verificacion de creacion de registro en DB
        $this->seeInDatabase('reservations', [
            'no_reservation' => $no_reservation,
            'date_in'     => $date_in,
            'date_out'   => $date_out,
            'pending'   => true,
            'user_id'   => $user->id,
        ]);


        // Test a user ir redirected to the post details affter creating it.
        //comprovar que el usuario fue redirigido
        $this->see($date_in);
        //$this->seeInElement('h1', 'Esta es una pregunta');


    }


    private function noResrvation($cantidad=3, $longitud=10, $incluyeNum=true){

        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if($incluyeNum)
            $caracteres .= "1234567890";

        $arrPassResult=array();
        $index=0;
        while($index<$cantidad){
            $tmp="";
            for($i=0;$i<$longitud;$i++){
                $tmp.=$caracteres[rand(0,strlen($caracteres)-1)];
            }
            if(!in_array($tmp, $arrPassResult)){
                $arrPassResult[]=$tmp;
                $index++;
            }
        }
        return $tmp;
    }
}