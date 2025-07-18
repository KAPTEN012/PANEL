<?php

namespace App\Controllers;

use App\Models\KeysModel;

class Connect extends BaseController
{
    protected $model, $game, $uKey, $sDev;

    public function __construct()
    {
        include('conn.php');
//=================================================
        $sql1 ="select * from onoff where id=1";
        $result1 = mysqli_query($conn, $sql1);
        $userDetails1 = mysqli_fetch_assoc($result1);
//=================================================
        $this->model = new KeysModel();
//=================================================
        if($userDetails1['status'] == 'on')
        {
            $this->maintenance = true;
        } else {
            $this->maintenance = false;
        }
//=================================================
       $this->staticWords = "Vm8Lk7Uj2JmsjCPVPVjrLa7zgfx3uz9E";
    }

    public function index()
    {
        if ($this->request->getPost()) {
            return $this->index_post();
        } else {
            $nata = [
                "web_info" => [
                    "_client" => BASE_NAME,
                    "license" => "Qp5KSGTquetnUkjX6UVBAURH8hTkZuLM",
                    "version" => "1.0.0",
                ],
                "web__dev" => [
                    "author" => "@",
                    "telegram" => "https://t.me/"
                           ],
            ];
            
            return "<
<h1><strong><center><font size='10' color='red' face='arial'><marquee direction='right' scrollamount='15'>WANT OWN VENOM PANEL?<br> CONTACT TO VENOM PRATAP</marquee></font></center></strong></h1> 
            <br>
            <h1><strong><center><a href='http://krishnapratap.site/login' target='_blank'>
 
  <button style=' hover: {background-color: #3e8e41}
    e;
  padding: 15px 25px;
  font-size: 50px;
  border-radius: 15px;
  box-shadow: 0
.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
 // transform: translateY(4px);'>

            LOGIN PANEL
            </button></a> </font></center></strong></h1>
            
            <br>
            
           <h1><strong><center><font size='45px' color='red' face='arial'> <a href='https://t.me/Venom_pratap' target='_blank'>
            <button style='font-size: 40px; padding: 15px 25px; box-shadow: 0 5px #666; background-color: ORANGE; color: white; border: none; border-radius: 15px;'>
            CONTACT TO DEVELPOER
            </button></a></font></center></strong></h1>
            <br>
            
           <h1><strong><center><a href='https://t.me/+QW6Vx7_9WcgyMDg9' target='_blank'>
 
  <button style=' hover: {background-color: #3e8e41}
    e;
    display: inline-block;
  padding: 15px 25px;
  font-size: 40px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;'>

            JOIN MORE UPDATES TELEGRAM
            </button></a> </font></center></strong></h1>
            <br>
            
            <h2><strong><font size='10' color='BLUE' face='monospace' >
  
  <p >This is <b>Venom Pratap</b> Vip Panel For free users.This panel have added more security.No one can Attack <B>D-DOS</B> in our panel.</p>
  <p>So its World vip panel.<br> OR koi #KIDS Jo D-dos Marne K liye try Kar rhe ho usko bata de tere d dos mere panel Se jhath k baal vi nhi ukhedega.</p>
            </h2>
            <h1><strong><center><font size='10' color='green' face='arial'><marquee direction='right' scrollamount='15'> HATERS AND D-DOS MARNE WALO <br> Teri <B>MAA</B> KI CHUT..<br> NIKL #RANDI K BACCHA !!</marquee></font></center></strong></h1>";
            $this->response->setJSON($nata);
        }
    }

    public function index_post()
    {
        $isMT = $this->maintenance;
        $game = $this->request->getPost('game');
        $uKey = $this->request->getPost('user_key');
        $sDev = $this->request->getPost('serial');

        $form_rules = [
            'game' => 'required|alpha_dash',
            'user_key' => 'required|min_length[1]|max_length[36]',
            'serial' => 'required|alpha_dash'
        ];

        if (!$this->validate($form_rules)) {
            $data = [
                'status' => false,
                'reason' => "Bad Parameter",
            ];
            return $this->response->setJSON($data);
        }

        if ($isMT) {
            
            include('conn.php');
        
            $sql1 ="select * from onoff where id=1";
            $result1 = mysqli_query($conn, $sql1);
            $userDetails1 = mysqli_fetch_assoc($result1);
        
            
            $data = [
                'status' => true,
                'reason' => $userDetails1['myinput']
            ];
        } else {
            if (!$game or !$uKey or !$sDev) {
                $data = [
                    'status' => false,
                    'reason' => 'INVALID PARAMETER'
                ];
            } else {
                $time = new \CodeIgniter\I18n\Time;
                $model = $this->model;
                $findKey = $model
                    ->getKeysGame(['user_key' => $uKey, 'game' => $game]);

                if ($findKey) {
                    if ($findKey->status != 1) {
                        $data = [
                            'status' => false,
                            'reason' => 'USER BLOCKED'
                        ];
                    } else {
                        $id_keys = $findKey->id_keys;
                        $duration = $findKey->duration;
                        $expired = $findKey->expired_date;
                        $max_dev = $findKey->max_devices;
                        $devices = $findKey->devices;
    
                        function checkDevicesAdd($serial, $devices, $max_dev)
                        {
                            $lsDevice = explode(",", $devices);
                            $cDevices = isset($devices) ? count($lsDevice) : 0;
                            $serialOn = in_array($serial, $lsDevice);
    
                            if ($serialOn) {
                                return true;
                            } else {
                                if ($cDevices < $max_dev) {
                                    array_push($lsDevice, $serial);
                                    $setDevice = reduce_multiples(implode(",", $lsDevice), ",", true);
                                    return ['devices' => $setDevice];
                                } else {
                                    // ! false - devices max
                                    return false;
                                }
                            }
                        }
    
                        if (!$expired) {
                            $setExpired = $time::now()->addHours($duration);
                            $model->update($id_keys, ['expired_date' => $setExpired]);
                            $data['status'] = true;
                        } else {
                            if ($time::now()->isBefore($expired)) {
                                $data['status'] = true;
                            } else {
                                $data = [
                                    'status' => false,
                                    'reason' => 'EXPIRED KEY'
                                ];
                            }
                        }
    
                        if ($data['status']) {
                            
                            include('conn.php');
        
                            $sql2 ="select * from modname where id=1";
                            $result2 = mysqli_query($conn, $sql2);
                            $userDetails2 = mysqli_fetch_assoc($result2);
                            
                            $sql3 ="select * from _ftext where id=1";
                            $result3 = mysqli_query($conn, $sql3);
                            $userDetails3 = mysqli_fetch_assoc($result3);
                            
                            $sql4 = "SELECT expired_date FROM keys_code WHERE user_key='$uKey'";
                            $result4 = mysqli_query($conn, $sql4);
                            $userDetails4 = mysqli_fetch_assoc($result4);
//=================================================
        $sql = "SELECT * FROM Feature WHERE id=1";
        $result = mysqli_query($conn, $sql);
        $ModFeatureStatus = mysqli_fetch_assoc($result);
//=================================================
        $rngcnt = $time->getTimestamp();
//=================================================
                            $devicesAdd = checkDevicesAdd($sDev, $devices, $max_dev);
                            if ($devicesAdd) {
                                if (is_array($devicesAdd)) {
                                    $model->update($id_keys, $devicesAdd);
                                }
                                // ? game-user_key-serial-word di line 15
                                $real = "$game-$uKey-$sDev-$this->staticWords";
                                
                                $expiry = $findKey->expired_date;
                            if ($expiry == null) {
                                 $expiry = $time::now()->addDays($duration);
                            }
                            
                                $data = [
                                    'status' => true,
                                    'data' => [
                                        'real' => $real,
                                        'token' => md5($real),
                                        'modname' => $userDetails2['modname'],
                                        'mod_status' => $userDetails3['_status'],
                                        'credit' => $userDetails3['_ftext'],
                                        'ESP' => $ModFeatureStatus['ESP'],
                                        'Item' => $ModFeatureStatus['Item'],
                                        'AIM' => $ModFeatureStatus['AIM'],
                                        'SilentAim' => $ModFeatureStatus['SilentAim'],
                                        'BulletTrack' => $ModFeatureStatus['BulletTrack'],
                                        'Floating' => $ModFeatureStatus['Floating'],
                                        'Memory' => $ModFeatureStatus['Memory'],
                                        'Setting' => $ModFeatureStatus['Setting'],
                                        'expired_date' => $userDetails4['expired_date'],
                                        'EXP' => $expiry,
                                        'exdate' => $expiry,
                                        'device'=> $max_dev,
                                        'rng' => $rngcnt
                                    ],
                                ];
                            } else {
                                $data = [
                                    'status' => false,
                                    'reason' => 'MAX DEVICE REACHED'
                                ];
                            }
                        }
                    }
                } else {
                    $data = [
                        'status' => false,
                        'reason' => 'USER OR GAME NOT REGISTERED'
                    ];
                }
            }
        }
        return $this->response->setJSON($data);
    }
}
