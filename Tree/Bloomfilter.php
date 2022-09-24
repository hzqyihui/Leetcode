<?php


/**
 * 使用整数数组类型，拼成 比特类型的数组， 从而实现布隆过滤器
 * 这是生成布隆过滤器的函数，相当于是 把 字符串通过 k个 hash函数，生成了k 个 Index的值，传入后，把对应的 bit 位描黑。
 * 还需要如何查
 * 1. 数组要开多大，才能降低失误率， 有一个公式 (n 是样本量， P 是 预期失误率（0.0001 即万分之一）)
 * m = - (n * lnP)/ (ln2)^2 ， 得出来的m 是 比特位数， 可以除以 8/1024/1024/1024 看看需要多少个G
 * 2. 如何确定hash 函数的个数
 * k = ln2 * m / n , 然后 往上取整
 * 3. 真实失误率
 * (1 - e ^ (- (n * k) / m)) ^ k
 */
function Bloomfilter($index = 30000){
    $arr = array_fill(0,1000,0);


    //由于整型是4个字节，32位的。
    //找到index这个数， 在整个数组里， 是属于哪一个下标的。
    $intIndex= floor($index / 32);

    //看index这个数， 在 32个比特位中的 哪个位置，
    $bitIndex = $index % 32;

    //这一步 ($arr[$intIndex] | (1 << $bitIndex)) 相当于就是描黑的过程
    $arr[$intIndex] = ($arr[$intIndex] | (1 << $bitIndex));
    printf("%b\n",1 << $bitIndex);

    var_dump($arr[$intIndex]);
    var_dump(1 << $bitIndex);

}

/**
 * 如何去查， 当又传入一个 字符串，想要查 该字符串在不在布隆过滤器里面的时候， 继续对 字符串计算 K个 hash 值， 如果算出来的k个位置 对应在比特位上，都是黑的， 那就代表，在过滤器里； 如果查出只要有一个不在，则代表不在过滤器里。
 */

Bloomfilter();