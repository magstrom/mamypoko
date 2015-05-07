    <?php
// echo "masuk ke inventory.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/account/accountURL.php');
//echo "masuk";exit();
function getAccount()
{
    $url = getAccountDetailURL();
    //echo $url;exit();
    $token = getToken();
    $account = getAPI($url, $token);
    if($account == 'KO')
    {
        return 'KO';
    }
    return json_decode($account, true);
}


?>