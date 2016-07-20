<?php

namespace Muserpol\Http\Controllers\Contribution;

use Illuminate\Http\Request;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use Auth;
use Validator;
use Session;
use Datatables;
use Carbon\Carbon;
use Muserpol\Helper\Util;
use Illuminate\Support\Collection;

use Muserpol\Affiliate;
use Muserpol\Contribution;
use Muserpol\ContributionPayment;
use Muserpol\Category;
use Muserpol\ContributionRate;
use Muserpol\IpcRate;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ShowContributions($affiliate_id)
    {
        $affiliate = Affiliate::idIs($affiliate_id)->first();

        $contribution = Contribution::affiliateidIs($affiliate->id)->first();

        if ($contribution) {

            $data = [

                'affiliate' => $affiliate,

            ];

            return view('contributions.view', $data);
        }
        else {

            $message = "No existe Registro de Aportes";
            Session::flash('message', $message);

            return redirect('affiliate/'.$affiliate_id);
        }
    }

    public function ShowData(Request $request)
    {
        $contributions = Contribution::select(['id', 'month_year', 'degree_id', 'unit_id', 'item', 'base_wage','seniority_bonus', 'study_bonus', 'position_bonus', 'border_bonus', 'east_bonus', 'public_security_bonus', 'gain', 'quotable', 'retirement_fund', 'mortuary_quota', 'total'])
                                        ->where('affiliate_id', $request->affiliate_id);

        return Datatables::of($contributions)
                ->editColumn('month_year', function ($contribution) { return Carbon::parse($contribution->month_year)->month . "-" . Carbon::parse($contribution->month_year)->year ; })
                ->editColumn('degree_id', function ($contribution) { return $contribution->degree_id ? $contribution->degree->code_level . "-" . $contribution->degree->code_degree : ''; })
                ->editColumn('unit_id', function ($contribution) { return $contribution->unit_id ? $contribution->unit->code : ''; })
                ->editColumn('base_wage', function ($contribution) { return Util::formatMoney($contribution->base_wage); })
                ->editColumn('seniority_bonus', function ($contribution) { return Util::formatMoney($contribution->seniority_bonus); })
                ->editColumn('study_bonus', function ($contribution) { return Util::formatMoney($contribution->study_bonus); })
                ->editColumn('position_bonus', function ($contribution) { return Util::formatMoney($contribution->position_bonus); })
                ->editColumn('border_bonus', function ($contribution) { return Util::formatMoney($contribution->border_bonus); })
                ->editColumn('east_bonus', function ($contribution) { return Util::formatMoney($contribution->east_bonus); })
                ->editColumn('public_security_bonus', function ($contribution) { return Util::formatMoney($contribution->public_security_bonus); })
                ->editColumn('gain', function ($contribution) { return Util::formatMoney($contribution->gain); })
                ->editColumn('quotable', function ($contribution) { return Util::formatMoney($contribution->quotable); })
                ->editColumn('retirement_fund', function ($contribution) { return Util::formatMoney($contribution->retirement_fund); })
                ->editColumn('mortuary_quota', function ($contribution) { return Util::formatMoney($contribution->mortuary_quota); })
                ->editColumn('total', function ($contribution) { return Util::formatMoney($contribution->total); })
                ->make(true);
    }

    public function SelectContribution($affiliate_id)
    {
        $affiliate = Affiliate::idIs($affiliate_id)->first();

        $data = [
            'affiliate' => $affiliate,
        ];

        return view('contributions.select', $data);
    }

    public function SelectData(Request $request)
    {
        $affiliate = Affiliate::idIs($request->affiliate_id)->first();
        $afi["affiliate"] = $affiliate->id;

        $group_contributions = new Collection;

        $now = Carbon::now();
        $from = Carbon::parse($affiliate->date_entry);
        $to = Carbon::createFromDate($now->year, $now->month, 1)->subMonth();

        for ($i=$from->year; $i <= $to->year ; $i++) {

            $count = 0;
            $total = 0;

            $base = array();
            $mes = array();

            for ($j=1; $j <= 12; $j++) {

                $contribution = Contribution::select(['month_year'])->where('affiliate_id', $affiliate->id)
                                                                    ->where('month_year', '=',Carbon::createFromDate($i, $j, 1)->toDateString())->first();
                if ($contribution) {
                    $mes["m".$j] = 1;
                    $count ++;
                    $total ++;
                }else {
                   $mes["m".$j] = 0;
                   $total ++;
                }

                if ($i == $from->year) {
                    if($j < $from->month){
                        $mes["m".$j] = -1;
                        $total --;
                    }
                }

                if ($i == $to->year) {
                    if($j > $to->month){
                        $mes["m".$j] = -1;
                        $total --;
                    }
                }
                $base = array_merge($base, $mes);

            }

            if ($total == $count) {
                $c["status"] = false;
            }else {
                $c["status"] = true;
            }

            $year = array('year'=> $i);
            $group_contributions->push(array_merge($afi, $c, $year, $base));

        }

        return Datatables::of($group_contributions)
                ->editColumn('m1', '<?php if($m1 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m1 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m1 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m2', '<?php if($m2 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m2 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m2 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m3', '<?php if($m3 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m3 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m3 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m4', '<?php if($m4 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m4 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m4 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m5', '<?php if($m5 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m5 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m5 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m6', '<?php if($m6 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m6 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m6 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m7', '<?php if($m7 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m7 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m7 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m8', '<?php if($m8 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m8 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m8 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m9', '<?php if($m9 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m9 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m9 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m10', '<?php if($m10 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m10 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m10 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m11', '<?php if($m11 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m11 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m11 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m12', '<?php if($m12 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m12 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m12 === -1){ ?>&nbsp;<?php } ?>')
                ->addColumn('action','
                    <?php if($status){ ?>
                        <div class="btn-group" style="margin:-6px 0;">
                            <a href="{{ url("calculation_contribution")}}/{{$affiliate}}/{{$year}}/normal" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" data-target="#" class="btn btn-success btn-raised btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("calculation_contribution")}}/{{$affiliate}}/{{$year}}/reintegro" style="padding:3px 10px;"><i class="glyphicon glyphicon-pencil"></i> reintegro</a></li>
                            </ul>
                        </div>
                    <?php } ?>')
                ->make(true);
    }


    public static function getViewModel($affiliate_id, $year, $category_id = null, $last_contribution = null)
    {
        $affiliate = Affiliate::idIs($affiliate_id)->first();

        $categories = Category::where('name', '<>', 'S/N')->get();
        $list_categories = array('' => '');
        foreach ($categories as $item) {
             $list_categories[$item->id]=$item->name;
        }

        $now = Carbon::now();
        $from = Carbon::parse($affiliate->date_entry);
        $to = Carbon::createFromDate($now->year, $now->month, 1)->subMonth();

        $ipc_actual = IpcRate::select('index')->where('month_year', '=',Carbon::createFromDate($now->year, $now->month, 1)->toDateString())->first();

        $months = new Collection;
        $month = array();

        for ($j=1; $j <= 12; $j++) {

            $contribution = Contribution::select(['month_year'])->where('affiliate_id', $affiliate_id)->where('month_year', '=', Carbon::createFromDate($year, $j, 1)->toDateString())->first();
            $contribution_rate = ContributionRate::where('month_year', '=', Carbon::createFromDate($year, $j, 1)->toDateString())->first();
            $ipc_rate = IpcRate::where('month_year', '=',Carbon::createFromDate($year, $j, 1)->toDateString())->first();

            if(!$contribution) {
                if ($year == $from->year) {
                    if($j >= $from->month) {
                        $month["id"] = $j;
                        $month["name"] = Util::getMes($j);
                        $month["retirement_fund"] = $contribution_rate ? $contribution_rate->retirement_fund : '0';
                        $month["mortuary_quota"] = $contribution_rate ? $contribution_rate->mortuary_quota : '0';
                        $month["ipc_rate"] = $contribution_rate ? $ipc_rate->index : '0';
                        $months->push($month);
                    }
                }
                elseif ($year == $to->year) {
                    if($j <= $to->month) {
                        $month["id"] = $j;
                        $month["name"] = Util::getMes($j);
                        $month["retirement_fund"] = $contribution_rate ? $contribution_rate->retirement_fund : '0';
                        $month["mortuary_quota"] = $contribution_rate ? $contribution_rate->mortuary_quota : '0';
                        $month["ipc_rate"] = $contribution_rate ? $ipc_rate->index : '0';
                        $months->push($month);
                    }
                }else {
                    $month["id"] = $j;
                    $month["name"] = Util::getMes($j);
                    $month["retirement_fund"] = $contribution_rate ? $contribution_rate->retirement_fund : '0';
                    $month["mortuary_quota"] = $contribution_rate ? $contribution_rate->mortuary_quota : '0';
                    $month["ipc_rate"] = $contribution_rate ? $ipc_rate->index : '0';
                    $months->push($month);
                }
            }
        }

        if (!$last_contribution) {
            $date = Carbon::createFromDate($year, $months[0]["id"], 1)->subMonth();
            $last_contribution = null;
            while (!$last_contribution) {
                $last_contribution = Contribution::affiliateidIs($affiliate->id)->where('month_year', '=', $date->toDateString())->first();
                $date = $date->subMonth();
            }
        }

        $last_contribution->date = Util::getDateShort($last_contribution->month_year);

        if ($category_id) {
            $affiliate->category_id = $category_id;
        }

        return [

            'affiliate' => $affiliate,
            'list_categories' => $list_categories,
            'categories' => Category::where('name', '<>', 'S/N')->orderBy('id', 'asc')->get(array('percentage', 'name', 'id')),
            'ipc_actual' => $ipc_actual,
            'months' => $months,
            'year' => $year,
            'last_contribution' => $last_contribution

        ];
    }

    public function CalculationContribution($affiliate_id, $year, $type)
    {

        $data = [

            'type' => $type == "reintegro" ? "Reintegro" : "Normal",

        ];

        $data = array_merge($data, self::getViewModel($affiliate_id, $year));
        return view('contributions.calculation', $data);
    }

    public function GenerateCalculationContribution(Request $request)
    {
        $last_contribution = new Contribution;
        $last_contribution->base_wage = $request->base_wage;
        $last_contribution->study_bonus = $request->study_bonus;
        $last_contribution->position_bonus = $request->position_bonus;
        $last_contribution->border_bonus = $request->border_bonus;
        $last_contribution->east_bonus = $request->east_bonus;

        $data = [

            'type' => $request->type == "reintegro" ? "Reintegro" : "Normal",

        ];

        $data = array_merge($data, self::getViewModel($request->affiliate_id, $request->year, $request->category_id, $last_contribution));
        return view('contributions.calculation', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function store(Request $request)
    // {
    //     return $this->save($request);
    // }

}
