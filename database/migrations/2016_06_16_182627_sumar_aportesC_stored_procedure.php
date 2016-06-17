<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SumarAportesCStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
            DB::unprepared('CREATE PROCEDURE sumar_aportesC(IN mes int, anio int) BEGIN SELECT COUNT(DISTINCT(id)) total, SUM(aportes.sue) sueldo, SUM(aportes.b_ant) anti,SUM(aportes.b_est) b_est, SUM(aportes.b_car) b_car, SUM(aportes.b_fro) b_fro, SUM(aportes.b_ori) b_ori,SUM(aportes.b_seg) b_seg, SUM(aportes.gan) gan, SUM(aportes.cot) cot, SUM(aportes.mus) mus,SUM(aportes.fr) fr, SUM(aportes.sv) sv FROM APORTES WHERE Month(aportes.gest) = mes and Year(aportes.gest) = anio; END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP PROCEDURE IF EXISTS sumar_aportesC";
        DB::connection()->getPdo()->exec($sql);
    }
}
