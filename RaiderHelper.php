<?php

// супер класс
class RaiderHelper
{
    public function getGuildRaidRanking($region, $realm, $name) {        
        $ch = curl_init("https://raider.io/api/v1/guilds/profile?region=". $region ."&realm=" .$realm ."&name=". urlencode($name) . '&fields=raid_rankings');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
		$response = json_decode($response);
        return array(
            "profile-url" => $response-> {'profile_url'},
            'antorus-the-burning-throne' => array (
                "normal" => array(
                    "world" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'normal'} -> {'world'},
                    "region" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'normal'} -> {'region'},
                    "realm" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'normal'} -> {'realm'}
                ),
                "heroic" => array(
                    "world" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'heroic'} -> {'world'},
                    "region" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'heroic'} -> {'region'},
                    "realm" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'heroic'} -> {'realm'}
                ),
                "mythic" => array(
                    "world" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'mythic'} -> {'world'},
                    "region" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'mythic'} -> {'region'},
                    "realm" => $response-> {'raid_rankings'} ->{'antorus-the-burning-throne'} -> {'mythic'} -> {'realm'}
                ),  

            ));        
    }

}

 //Проверка работоспособности.
$helper = new RaiderHelper();
$result = $helper->getGuildRaidRanking("eu", "borean-tundra", "Пермские медведи");
////$helper->setPawnSting('dfd');
//$result = $helper->checkJob();
//
//while ($result['position'] > 1){
//    $result = $helper->checkJob();
//    sleep(2);
//}

//$result = $helper->getReport('v3FGgDXxaD9m72UoNbgkmU');

//while (strcasecmp($result['status'], 'success') != 0){
//    $result = $helper->getReport();
//    sleep(2);
//}
var_dump($result);

