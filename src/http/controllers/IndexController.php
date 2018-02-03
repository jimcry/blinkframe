<?php

namespace app\http\controllers;

use blink\core\Object;
use etherscan\api\EtherscanAPIConf;
use etherscan\api\Etherscan;
use Ethereum\Ethereum;

class IndexController extends Object
{
    public function index()
    {
        $Ethereum = new Ethereum("http://localhost:8545");
        //获取钱包列表
        //$Ethereum->request('eth_accounts');
        //获取钱包余额
        //$Ethereum->etherRequest('eth_getBalance', ['0x934792417a627dec5e11b1f9d44e87fa8e067f1e', 'lastest']);
        //创建账户
        //$res = $Ethereum->etherRequest('personal_newAccount', ['12345678']);
        //转账
        $gas = $Ethereum->etherRequest('eth_gasPrice');
        //$res = $Ethereum->etherRequest('', ['1', 'ether']);
        var_dump($gas);
        exit;
        //
        //$api_key = '';
        $Etherscan = new Etherscan($api_key);
        //查询代币总量 EOS
        $res = $Etherscan->tokenSupply('0x86fa049857e0209aa7d9e616f7eb3b3b78ecfdb0');

        //查询ETH余额
        $address = '0x934792417a627dec5e11b1f9d44e87fa8e067f1e';
        $Etherscan->balance($address);

        //多地址查询ETH余额
        $addresss = ['0x934792417a627dec5e11b1f9d44e87fa8e067f1e'];
        $Etherscan->balanceMulti($addresss);

        //ETH交易记录
        $startBlock = 0;
        $endBlock = 6000000;
        $Etherscan->transactionList($address, $startBlock, $endBlock, 'desc');

        //获取代币余额 EOS
        $Etherscan->tokenBalance('0x86fa049857e0209aa7d9e616f7eb3b3b78ecfdb0', '0xd551234ae421e3bcba99a0da6d736074f22192ff');
    }
}
