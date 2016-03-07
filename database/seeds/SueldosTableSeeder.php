<?php

use Illuminate\Database\Seeder;

class SueldosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createSueldos();

        Eloquent::reguard();
    }

    private function createSueldos()
    {
    	$statuses =[

	    	//2008
	    	    
			['grado_id'=>'1','anio'=>'2008','sue'=>'4505.00','user_id' => '1'],
			['grado_id'=>'2','anio'=>'2008','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'3','anio'=>'2008','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'4','anio'=>'2008','sue'=>'3806.00','user_id' => '1'],
			['grado_id'=>'5','anio'=>'2008','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'6','anio'=>'2008','sue'=>'','user_id' => '1'],
			['grado_id'=>'7','anio'=>'2008','sue'=>'2337.00','user_id' => '1'],
			['grado_id'=>'8','anio'=>'2008','sue'=>'2215.00','user_id' => '1'],
			['grado_id'=>'9','anio'=>'2008','sue'=>'1960.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2008','sue'=>'1847.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2008','sue'=>'1714.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2008','sue'=>'1655.00','user_id' => '1'],

			['grado_id' => '13', 'anio'=>'2008','sue'=>'1314.00','user_id' => '1'],
	        ['grado_id' => '14', 'anio'=>'2008','sue'=>'1279.00','user_id' => '1'],
	        ['grado_id' => '15', 'anio'=>'2008','sue'=>'1266.00','user_id' => '1'],
	        ['grado_id' => '16', 'anio'=>'2008','sue'=>'1214.00','user_id' => '1'],
	        ['grado_id' => '17', 'anio'=>'2008','sue'=>'1171.00','user_id' => '1'],
	        ['grado_id' => '18', 'anio'=>'2008','sue'=>'1138.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2008','sue'=>'1357.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2008','sue'=>'1206.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2008','sue'=>'1163.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2008','sue'=>'1119.00','user_id' => '1'], 
	        ['grado_id' => '23','anio'=>'2008','sue'=>'1094.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2008','sue'=>'1049.00','user_id' => '1'], 
	        ['grado_id' => '25','anio'=>'2008','sue'=>'1042.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2008' ,'sue'=>'1015.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2008','sue'=>'','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2008','sue'=>'','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2008','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '30','anio'=>'2008','sue'=>'','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2008','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '32', 'anio'=>'2008','sue'=>'','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2008','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '34','anio'=>'2008','sue'=>'1015.00','user_id' => '1'], 

	        //2009

	        ['grado_id'=>'1','anio'=>'2009','sue'=>'4505.00','user_id' => '1'],
			['grado_id'=>'2','anio'=>'2009','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'3','anio'=>'2009','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'4','anio'=>'2009','sue'=>'3806.00','user_id' => '1'],
			['grado_id'=>'5','anio'=>'2009','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'6','anio'=>'2009','sue'=>'','user_id' => '1'],
			['grado_id'=>'7','anio'=>'2009','sue'=>'2617.00','user_id' => '1'],
			['grado_id'=>'8','anio'=>'2009','sue'=>'2481.00','user_id' => '1'],
			['grado_id'=>'9','anio'=>'2009','sue'=>'2195.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2009','sue'=>'2069.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2009','sue'=>'1920.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2009','sue'=>'1854.00','user_id' => '1'],

			['grado_id' => '13', 'anio'=>'2009','sue'=>'1472.00','user_id' => '1'],
	        ['grado_id' => '14', 'anio'=>'2009','sue'=>'1432.00','user_id' => '1'],
	        ['grado_id' => '15', 'anio'=>'2009','sue'=>'1418.00','user_id' => '1'],
	        ['grado_id' => '16', 'anio'=>'2009','sue'=>'1359.00','user_id' => '1'],
	        ['grado_id' => '17', 'anio'=>'2009','sue'=>'1312.00','user_id' => '1'],
	        ['grado_id' => '18', 'anio'=>'2009','sue'=>'1275.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2009','sue'=>'1547.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2009','sue'=>'1375.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2009','sue'=>'1326.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2009','sue'=>'1276.00','user_id' => '1'], 
	        ['grado_id' => '23','anio'=>'2009','sue'=>'1247.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2009','sue'=>'1196.00','user_id' => '1'], 
	        ['grado_id' => '25','anio'=>'2009','sue'=>'1188.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2009' ,'sue'=>'1157.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2009','sue'=>'','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2009','sue'=>'','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2009','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '30','anio'=>'2009','sue'=>'','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2009','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '32', 'anio'=>'2009','sue'=>'','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2009','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '34','anio'=>'2009','sue'=>'1157.00','user_id' => '1'], 

	        //2010
	        ['grado_id'=>'1','anio'=>'2010','sue'=>'4505.00','user_id' => '1'],
			['grado_id'=>'2','anio'=>'2010','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'3','anio'=>'2010','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'4','anio'=>'2010','sue'=>'3806.00','user_id' => '1'],
			['grado_id'=>'5','anio'=>'2010','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'6','anio'=>'2010','sue'=>'','user_id' => '1'],
			['grado_id'=>'7','anio'=>'2010','sue'=>'2696.00','user_id' => '1'],
			['grado_id'=>'8','anio'=>'2010','sue'=>'2555.00','user_id' => '1'],
			['grado_id'=>'9','anio'=>'2010','sue'=>'2261.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2010','sue'=>'2131.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2010','sue'=>'1978.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2010','sue'=>'1910.00','user_id' => '1'],

			['grado_id' => '13', 'anio'=>'2010','sue'=>'1516.00','user_id' => '1'],
	        ['grado_id' => '14', 'anio'=>'2010','sue'=>'1475.00','user_id' => '1'],
	        ['grado_id' => '15', 'anio'=>'2010','sue'=>'1461.00','user_id' => '1'],
	        ['grado_id' => '16', 'anio'=>'2010','sue'=>'1400.00','user_id' => '1'],
	        ['grado_id' => '17', 'anio'=>'2010','sue'=>'1351.00','user_id' => '1'],
	        ['grado_id' => '18', 'anio'=>'2010','sue'=>'1313.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2010','sue'=>'1593.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2010','sue'=>'1416.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2010','sue'=>'1366.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2010','sue'=>'1314.00','user_id' => '1'], 
	        ['grado_id' => '23','anio'=>'2010','sue'=>'1284.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2010','sue'=>'1232.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2010','sue'=>'1224.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2010' ,'sue'=>'1192.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2010','sue'=>'','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2010','sue'=>'','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2010','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '30','anio'=>'2010','sue'=>'','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2010','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '32','anio'=>'2010','sue'=>'','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2010','sue'=>'','user_id' => '1'], 
	        ['grado_id' => '34','anio'=>'2010','sue'=>'1192.00','user_id' => '1'], 

	        //2011

	        ['grado_id'=>'1','anio'=>'2011','sue'=>'4505.00','user_id' => '1'],
	        ['grado_id'=>'2','anio'=>'2011','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'3','anio'=>'2011','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'4','anio'=>'2011','sue'=>'3806.00','user_id' => '1'],
			['grado_id'=>'5','anio'=>'2011','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'6','anio'=>'2011','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'7','anio'=>'2011','sue'=>'2920.00','user_id' => '1'],
			['grado_id'=>'8','anio'=>'2011','sue'=>'2767.00','user_id' => '1'],
			['grado_id'=>'9','anio'=>'2011','sue'=>'2449.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2011','sue'=>'2308.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2011','sue'=>'2142.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2011','sue'=>'2069.00','user_id' => '1'],
			
			['grado_id' => '13','anio'=>'2011','sue'=>'1577.00','user_id' => '1'],
	        ['grado_id' => '14','anio'=>'2011','sue'=>'1534.00','user_id' => '1'],
	        ['grado_id' => '15','anio'=>'2011','sue'=>'1519.00','user_id' => '1'],
	        ['grado_id' => '16','anio'=>'2011','sue'=>'1456.00','user_id' => '1'],
	        ['grado_id' => '17','anio'=>'2011','sue'=>'1405.00','user_id' => '1'],
	        ['grado_id' => '18','anio'=>'2011','sue'=>'1366.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2011','sue'=>'1755.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2011','sue'=>'1560.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2011','sue'=>'1505.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2011','sue'=>'1448.00','user_id' => '1'],
	        ['grado_id' => '23','anio'=>'2011','sue'=>'1415.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2011','sue'=>'1358.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2011','sue'=>'1349.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2011' ,'sue'=>'1326.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2011','sue'=>'1673.00','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2011','sue'=>'1487.00','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2011','sue'=>'1434.00','user_id' => '1'], 
	        ['grado_id' => '30','anio'=>'2011','sue'=>'1380.00','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2011','sue'=>'1348.00','user_id' => '1'], 
	        ['grado_id' => '32','anio'=>'2011','sue'=>'1294.00','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2011','sue'=>'1285.00','user_id' => '1'], 
	        ['grado_id' => '34','anio'=>'2011','sue'=>'1264.00','user_id' => '1'], 

	        //2012.1

	        ['grado_id'=>'1','anio'=>'2012.1','sue'=>'4505.00','user_id' => '1'],
	        ['grado_id'=>'2','anio'=>'2012.1','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'3','anio'=>'2012.1','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'4','anio'=>'2012.1','sue'=>'3806.00','user_id' => '1'],
			['grado_id'=>'5','anio'=>'2012.1','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'6','anio'=>'2012.1','sue'=>'3393.00','user_id' => '1'],
			['grado_id'=>'7','anio'=>'2012.1','sue'=>'3095.00','user_id' => '1'],
			['grado_id'=>'8','anio'=>'2012.1','sue'=>'2933.00','user_id' => '1'],
			['grado_id'=>'9','anio'=>'2012.1','sue'=>'2596.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2012.1','sue'=>'2446.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2012.1','sue'=>'2271.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2012.1','sue'=>'2193.00','user_id' => '1'],
			
			['grado_id' => '13','anio'=>'2012.1','sue'=>'1750.00','user_id' => '1'],
	        ['grado_id' => '14','anio'=>'2012.1','sue'=>'1703.00','user_id' => '1'],
	        ['grado_id' => '15','anio'=>'2012.1','sue'=>'1686.00','user_id' => '1'],
	        ['grado_id' => '16','anio'=>'2012.1','sue'=>'1616.00','user_id' => '1'],
	        ['grado_id' => '17','anio'=>'2012.1','sue'=>'1560.00','user_id' => '1'],
	        ['grado_id' => '18','anio'=>'2012.1','sue'=>'1516.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2012.1','sue'=>'1896.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2012.1','sue'=>'1685.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2012.1','sue'=>'1626.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2012.1','sue'=>'1564.00','user_id' => '1'],
	        ['grado_id' => '23','anio'=>'2012.1','sue'=>'1529.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2012.1','sue'=>'1467.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2012.1','sue'=>'1457.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2012.1','sue'=>'1445.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2012.1','sue'=>'1874.00','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2012.1','sue'=>'1665.00','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2012.1','sue'=>'1606.00','user_id' => '1'],
	        ['grado_id' => '30','anio'=>'2012.1','sue'=>'1546.00','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2012.1','sue'=>'1510.00','user_id' => '1'],
	        ['grado_id' => '32','anio'=>'2012.1','sue'=>'1449.00','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2012.1','sue'=>'1439.00','user_id' => '1'],
	        ['grado_id' => '34','anio'=>'2012.1','sue'=>'1416.00','user_id' => '1'],

	        //2012.2

	        ['grado_id'=>'1','anio'=>'2012.2','sue'=>'4505.00','user_id' => '1'], 
	        ['grado_id'=>'2','anio'=>'2012.2','sue'=>'4223.00','user_id' => '1'], 
			['grado_id'=>'3','anio'=>'2012.2','sue'=>'4223.00','user_id' => '1'], 
			['grado_id'=>'4','anio'=>'2012.2','sue'=>'3806.00','user_id' => '1'], 
			['grado_id'=>'5','anio'=>'2012.2','sue'=>'3493.00','user_id' => '1'], 
			['grado_id'=>'6','anio'=>'2012.2','sue'=>'3493.00','user_id' => '1'], 
			['grado_id'=>'7','anio'=>'2012.2','sue'=>'3195.00','user_id' => '1'], 
			['grado_id'=>'8','anio'=>'2012.2','sue'=>'3033.00','user_id' => '1'], 
			['grado_id'=>'9','anio'=>'2012.2','sue'=>'2696.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2012.2','sue'=>'2546.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2012.2','sue'=>'2371.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2012.2','sue'=>'2293.00','user_id' => '1'],
			
			['grado_id' => '13','anio'=>'2012.2','sue'=>'1850.00','user_id' => '1'],
	        ['grado_id' => '14','anio'=>'2012.2','sue'=>'1803.00','user_id' => '1'],
	        ['grado_id' => '15','anio'=>'2012.2','sue'=>'1786.00','user_id' => '1'],
	        ['grado_id' => '16','anio'=>'2012.2','sue'=>'1716.00','user_id' => '1'],
	        ['grado_id' => '17','anio'=>'2012.2','sue'=>'1660.00','user_id' => '1'],
	        ['grado_id' => '18','anio'=>'2012.2','sue'=>'1616.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2012.2','sue'=>'1996.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2012.2','sue'=>'1785.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2012.2','sue'=>'1726.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2012.2','sue'=>'1664.00','user_id' => '1'],
	        ['grado_id' => '23','anio'=>'2012.2','sue'=>'1629.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2012.2','sue'=>'1567.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2012.2','sue'=>'1557.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2012.2','sue'=>'1545.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2012.2','sue'=>'1974.00','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2012.2','sue'=>'1765.00','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2012.2','sue'=>'1706.00','user_id' => '1'],
	        ['grado_id' => '30','anio'=>'2012.2','sue'=>'1646.00','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2012.2','sue'=>'1610.00','user_id' => '1'],
	        ['grado_id' => '32','anio'=>'2012.2','sue'=>'1549.00','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2012.2','sue'=>'1539.00','user_id' => '1'],
	        ['grado_id' => '34','anio'=>'2012.2','sue'=>'1516.00','user_id' => '1'],

	        //2013

	        ['grado_id'=>'1','anio'=>'2013','sue'=>'4505.00','user_id' => '1'],
	        ['grado_id'=>'2','anio'=>'2013','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'3','anio'=>'2013','sue'=>'4223.00','user_id' => '1'],
			['grado_id'=>'4','anio'=>'2013','sue'=>'4110.00','user_id' => '1'],
			['grado_id'=>'5','anio'=>'2013','sue'=>'3772.00','user_id' => '1'],
			['grado_id'=>'6','anio'=>'2013','sue'=>'3772.00','user_id' => '1'],
			['grado_id'=>'7','anio'=>'2013','sue'=>'3450.00','user_id' => '1'],
			['grado_id'=>'8','anio'=>'2013','sue'=>'3275.00','user_id' => '1'],
			['grado_id'=>'9','anio'=>'2013','sue'=>'2911.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2013','sue'=>'2749.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2013','sue'=>'2560.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2013','sue'=>'2476.00','user_id' => '1'],
			
			['grado_id' => '13','anio'=>'2013','sue'=>'1998.00','user_id' => '1'],
	        ['grado_id' => '14','anio'=>'2013','sue'=>'1947.00','user_id' => '1'],
	        ['grado_id' => '15','anio'=>'2013','sue'=>'1928.00','user_id' => '1'],
	        ['grado_id' => '16','anio'=>'2013','sue'=>'1853.00','user_id' => '1'],
	        ['grado_id' => '17','anio'=>'2013','sue'=>'1792.00','user_id' => '1'],
	        ['grado_id' => '18','anio'=>'2013','sue'=>'1745.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2013','sue'=>'2155.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2013','sue'=>'1927.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2013','sue'=>'1864.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2013','sue'=>'1797.00','user_id' => '1'],
	        ['grado_id' => '23','anio'=>'2013','sue'=>'1759.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2013','sue'=>'1692.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2013','sue'=>'1681.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2013','sue'=>'1668.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2013','sue'=>'2131.00','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2013','sue'=>'1906.00','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2013','sue'=>'1842.00','user_id' => '1'],
	        ['grado_id' => '30','anio'=>'2013','sue'=>'1777.00','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2013','sue'=>'1738.00','user_id' => '1'],
	        ['grado_id' => '32','anio'=>'2013','sue'=>'1672.00','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2013','sue'=>'1662.00','user_id' => '1'],
	        ['grado_id' => '34','anio'=>'2013','sue'=>'1637.00','user_id' => '1'],

	        //2014

	        ['grado_id'=>'1','anio'=>'2014','sue'=>'4635.00','user_id' => '1'], 
	        ['grado_id'=>'2','anio'=>'2014','sue'=>'4354.00','user_id' => '1'], 
			['grado_id'=>'3','anio'=>'2014','sue'=>'4354.00','user_id' => '1'], 
			['grado_id'=>'4','anio'=>'2014','sue'=>'4242.00','user_id' => '1'], 
			['grado_id'=>'5','anio'=>'2014','sue'=>'3905.00','user_id' => '1'], 
			['grado_id'=>'6','anio'=>'2014','sue'=>'3905.00','user_id' => '1'], 
			['grado_id'=>'7','anio'=>'2014','sue'=>'3584.00','user_id' => '1'], 
			['grado_id'=>'8','anio'=>'2014','sue'=>'3410.00','user_id' => '1'], 
			['grado_id'=>'9','anio'=>'2014','sue'=>'3047.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2014','sue'=>'2886.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2014','sue'=>'2698.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2014','sue'=>'2615.00','user_id' => '1'],
			
			['grado_id' => '13','anio'=>'2014','sue'=>'2138.00','user_id' => '1'],
	        ['grado_id' => '14','anio'=>'2014','sue'=>'2091.00','user_id' => '1'],
	        ['grado_id' => '15','anio'=>'2014','sue'=>'2077.00','user_id' => '1'],
	        ['grado_id' => '16','anio'=>'2014','sue'=>'2006.00','user_id' => '1'],
	        ['grado_id' => '17','anio'=>'2014','sue'=>'1948.00','user_id' => '1'],
	        ['grado_id' => '18','anio'=>'2014','sue'=>'1902.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2014','sue'=>'2296.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2014','sue'=>'2079.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2014','sue'=>'2032.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2014','sue'=>'1972.00','user_id' => '1'],
	        ['grado_id' => '23','anio'=>'2014','sue'=>'1939.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2014','sue'=>'1881.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2014','sue'=>'1871.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2014','sue'=>'1860.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2014','sue'=>'2289.00','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2014','sue'=>'2071.00','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2014','sue'=>'2028.00','user_id' => '1'],
	        ['grado_id' => '30','anio'=>'2014','sue'=>'1964.00','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2014','sue'=>'1926.00','user_id' => '1'],
	        ['grado_id' => '32','anio'=>'2014','sue'=>'1861.00','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2014','sue'=>'1852.00','user_id' => '1'],
	        ['grado_id' => '34','anio'=>'2014','sue'=>'1828.00','user_id' => '1'],

	        //2015

	        ['grado_id'=>'1','anio'=>'2015','sue'=>'','user_id' => '1'], 
	        ['grado_id'=>'2','anio'=>'2015','sue'=>'5029.00','user_id' => '1'], 
			['grado_id'=>'3','anio'=>'2015','sue'=>'4724.00','user_id' => '1'], 
			['grado_id'=>'4','anio'=>'2015','sue'=>'4603.00','user_id' => '1'], 
			['grado_id'=>'5','anio'=>'2015','sue'=>'4237.00','user_id' => '1'], 
			['grado_id'=>'6','anio'=>'2015','sue'=>'4237.00','user_id' => '1'], 
			['grado_id'=>'7','anio'=>'2015','sue'=>'3889.00','user_id' => '1'], 
			['grado_id'=>'8','anio'=>'2015','sue'=>'3700.00','user_id' => '1'], 
			['grado_id'=>'9','anio'=>'2015','sue'=>'3306.00','user_id' => '1'],
			['grado_id'=>'10','anio'=>'2015','sue'=>'3131.00','user_id' => '1'],
			['grado_id'=>'11','anio'=>'2015','sue'=>'2927.00','user_id' => '1'],
			['grado_id'=>'12','anio'=>'2015','sue'=>'2837.00','user_id' => '1'],
			
			['grado_id' => '13','anio'=>'2015','sue'=>'2320.00','user_id' => '1'],
	        ['grado_id' => '14','anio'=>'2015','sue'=>'2269.00','user_id' => '1'],
	        ['grado_id' => '15','anio'=>'2015','sue'=>'2254.00','user_id' => '1'],
	        ['grado_id' => '16','anio'=>'2015','sue'=>'2177.00','user_id' => '1'],
	        ['grado_id' => '17','anio'=>'2015','sue'=>'2114.00','user_id' => '1'],
	        ['grado_id' => '18','anio'=>'2015','sue'=>'2064.00','user_id' => '1'],

	        ['grado_id' => '19','anio'=>'2015','sue'=>'2491.00','user_id' => '1'],
	        ['grado_id' => '20','anio'=>'2015','sue'=>'2256.00','user_id' => '1'],
	        ['grado_id' => '21','anio'=>'2015','sue'=>'2205.00','user_id' => '1'],
	        ['grado_id' => '22','anio'=>'2015','sue'=>'2140.00','user_id' => '1'],
	        ['grado_id' => '23','anio'=>'2015','sue'=>'2104.00','user_id' => '1'],
	        ['grado_id' => '24','anio'=>'2015','sue'=>'2041.00','user_id' => '1'],
	        ['grado_id' => '25','anio'=>'2015','sue'=>'2030.00','user_id' => '1'],
	        ['grado_id' => '26','anio'=>'2015','sue'=>'2018.00','user_id' => '1'],

	        ['grado_id' => '27','anio'=>'2015','sue'=>'2484.00','user_id' => '1'],
	        ['grado_id' => '28','anio'=>'2015','sue'=>'2247.00','user_id' => '1'],
	        ['grado_id' => '29','anio'=>'2015','sue'=>'2200.00','user_id' => '1'],
	        ['grado_id' => '30','anio'=>'2015','sue'=>'2131.00','user_id' => '1'],
	        ['grado_id' => '31','anio'=>'2015','sue'=>'2090.00','user_id' => '1'],
	        ['grado_id' => '32','anio'=>'2015','sue'=>'2019.00','user_id' => '1'],
	        ['grado_id' => '33','anio'=>'2015','sue'=>'2009.00','user_id' => '1'],
	        ['grado_id' => '34','anio'=>'2015','sue'=>'1983.00','user_id' => '1']
        ];

        foreach ($statuses as $status) {

            Muserpol\Sueldo::create($status);
            
        }

    }
}
