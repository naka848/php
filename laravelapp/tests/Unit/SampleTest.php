<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
// Sampleクラスを使えるようにする
use App\Sample;
use App\CalculatePoint;

class SampleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /**
     * @test
     */
    public function 計算()
    {
        $calc = new CalculatePoint;
        $amount = 10000;
        // $point = $calc->CalculatePoint($amount);
        // if ($amount < 1000) {
        //     $this->assertEquals(0,$point);
        // }else if($amount < 10000){
        //     $this->assertEquals(($amount/100) * 1,$point);
        // }else{
        //     $this->assertEquals(($amount/100) * 2,$point);
        // }

        for ($i = 0; $i < 11000; $i++){
            
        }

    }

    // public function test_add()
    // {
    //     $sample = new Sample;
    //     $sum = $sample->add(5,3);
    //     $this->assertEquals(8,$sum);
    // }

    /**
     * @test
     */
    // public function ひき算()
    // {
    //     $sample = new Sample;
    //     $sum = $sample->sub(5,3);
    //     $this->assertEquals(1,$sum);
    // }

    // テストメソッド
    // public function testExample()
    // {
    //     $this->assertTrue(true);

    //     $this->assertFalse(false);

    //     $arr = [];
    //     $this->assertEmpty($arr);

    //     $msg = 'Hello';
    //     $this->assertEquals('Hello',$msg);

    //     $n = random_int(0,100);
    //     $this->assertLessThan(100,$n);
    // }
}
