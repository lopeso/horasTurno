<?
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller\HoraTrabalhada;

class Registros extends Controller



{
public function read_registros(){
    $data = $this->MTurno::getTurno();
    return view('registro_output', $data);
    }

}
?>