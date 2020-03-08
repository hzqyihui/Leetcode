<?php
/**
 * =====================================================================================
 *
 *        Filename: 栈与队列的转换.php
 *
 *     Description:
 *
 *         Created: 2020-03-01 21:21:33
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";

$array = [1, 2, 4, 6, 3, 7, 2, 6, 5, 7, 1, 5, 9];
$res   = maxGap($array);
dd($res);

/**
 * 两个栈来实现队列
 * 解析： 1. 使用两个栈， push 栈，始终是拿来放入新进队列的数据， pop 栈始终是弹出队列的数据， 每当我要pop拿数据的时候，我都去判断下
 *           pop栈是否为空，如果为空，我就需要把push栈的所有数据全部放入到 pop栈里去，如果不为空，则不能放入。该Pop的时候，继续用pop
 *           栈来pop数据， 所以我可以在各个操作，包括 push, pop, top等操作下都放入这个 往pop压数据的逻辑，只要不满足压数据的条件，
 *           直接返回就可以了。这样就实现了队列的意图了，先进先出。
 * Class TwoStackConvertQueue
 */
class TwoStackConvertQueue
{
    public $pushStack = null;
    public $popStack  = null;

    public function __construct()
    {
        $this->pushStack = new SplStack();
        $this->popStack  = new SplStack();
    }

    /**
     * 压入数据
     * @param $number
     */
    public function push($number)
    {
        $this->pushStack->push($number);
        $this->exchangeData();
    }

    /**
     * 弹出数据
     * @return string
     */
    public function pop()
    {
        if ($this->pushStack->isEmpty() && $this->popStack->isEmpty()) {
            return '';
        }
        $this->exchangeData();
        $this->popStack->pop();
    }

    /**
     * 获取头部数据，但是不弹出
     * @return string
     */
    public function top()
    {
        if ($this->pushStack->isEmpty() && $this->popStack->isEmpty()) {
            return '';
        }
        $this->exchangeData();
        $this->popStack->top();
    }

    /**
     * 让push栈的数据， 全部压入到 pop 栈中去。（意义在于，我每次取数据的时候，都是取的pop栈中的数据，每次压入数据都是往Push栈压数据的。）
     */
    public function exchangeData()
    {
        if (!$this->popStack->isEmpty()) {
            return;
        }
        while (!$this->pushStack->isEmpty()) {
            $this->popStack->push($this->pushStack->pop());
        }
    }

}

/**
 * 两个队列来实现栈的结构
 * 解析： 1. 实现两个队列，可使用自带的SPL 扩展库， 因为队列是先进先出，所以我把data 队列的所有值都弹出，并压入到help队列中，
 *           这样data队列剩余的这个数，就相当于是栈顶了，因为在data队列中，他是后面进入的。 当如果还需要再弹出的时候，我把 data 和 help
 *           进行一次交换，交换后原 data 变成 help 队列， help变成已经为空的 data队列。返回这样，即可实现。
 * Class TwoQueueConvertStack
 */
class TwoQueueConvertStack
{
    public $dataQueue = null;
    public $helpQueue = null;

    public function __construct()
    {
        $this->dataQueue = new SplQueue();
        $this->helpQueue = new SplQueue();
    }

    /**
     * 压入元素
     * @param $number
     */
    public function push($number)
    {
        $this->dataQueue->push($number);
    }

    /**
     * 弹出元素
     * @return mixed|string
     */
    public function pop()
    {
        if ($this->dataQueue->isEmpty()) {
            return '';
        }
        while ($this->dataQueue->count() > 1) {
            $this->helpQueue->push($this->dataQueue->pop());
        }
        $result = $this->dataQueue->pop();
        $this->swap();
        return $result;
    }

    /**
     * 获取栈顶的元素，但不弹出。
     * @return mixed|string
     */
    public function top()
    {
        if ($this->dataQueue->isEmpty()) {
            return '';
        }
        while ($this->dataQueue->count() > 1) {
            $this->helpQueue->push($this->dataQueue->pop());
        }
        $result = $this->dataQueue->pop();
        //因为不需要弹出，所以这里会多出这么一个步骤出来。
        $this->helpQueue->push($result);
        $this->swap();
        return $result;
    }

    /**
     * 交换 data 栈 和 help栈
     */
    public function swap()
    {
        $tmp             = $this->dataQueue;
        $this->dataQueue = $this->helpQueue;
        $this->helpQueue = $tmp;
    }
}

