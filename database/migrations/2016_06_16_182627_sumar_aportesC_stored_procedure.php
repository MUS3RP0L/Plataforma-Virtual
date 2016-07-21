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
    public function up() {

        DB::unprepared('CREATE PROCEDURE sumar_aportesC(IN mes int, anio int) BEGIN SELECT COUNT(DISTINCT(id)) total, SUM(contributions.base_wage) sueldo, SUM(contributions.seniority_bonus) anti,SUM(contributions.study_bonus) b_est, SUM(contributions.position_bonus) b_car, SUM(contributions.border_bonus) b_fro, SUM(contributions.east_bonus) b_ori,SUM(contributions.public_security_bonus) b_seg, SUM(contributions.gain) gan, SUM(contributions.quotable) cot, SUM(contributions.total) mus,SUM(contributions.retirement_fund) fr, SUM(contributions.mortuary_quota) sv FROM contributions WHERE Month(contributions.month_year) = mes and Year(contributions.month_year) = anio; END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        $sql = "DROP PROCEDURE IF EXISTS sumar_aportesC";
        DB::connection()->getPdo()->exec($sql);

    }
}
