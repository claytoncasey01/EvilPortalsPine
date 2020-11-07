<?php
    require_once('helper.php');
    header('Content-Type: application/json');
                    
    $aResult = array();
                    
    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }
                    
    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }
                    
    if( !isset($aResult['error']) ) {
                    
        switch($_POST['functionname']) {
            case 'getAllSSIDS':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = getAllSSIDS($_POST['arguments'][0]);
                }
                break;
            case 'getClientSSID':
                 if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = json_encode(getClientSSID($_POST['arguments'][0]));
                }
                break;
            default:
                $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
                break;
        }
                    
    }
                    
    echo json_encode($aResult);
                    
?>