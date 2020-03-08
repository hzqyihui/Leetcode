<?php
/**
 * =====================================================================================
 *
 *        Filename: �˻ʺ�ݹ�.php
 *
 *     Description: �˻ʺ�������ǣ� ��һ��8X8�������ϣ� �ڵ�ÿһ�ж��ڷ�һ���ʺ󣨹������壩��Ȼ���ø�λ�����ڵ��У��У�����б�߶�û��
 *                  ��Ӧ�����ӣ� ��Ϊ�ʺ���������������Ϲ���Ķ����Ա����Ե��������ڷţ�һ���ж����ְڷ���
 *
 *         Created: 2020-02-18 22:22:51
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
include_once "Common.php";

// �����ַ�ʽ
global $countNumber;


/**
 *
 * @param $row  int ��ǰ�ʺ�����������
 * @param $column Int ��ǰ�ʺ�����������
 * @param $array array ��ά��������
 * @return bool
 */
function notDangerous($row, $column, $array)
{
    //��1�����ж�ͬһ���Ƿ������ӡ��������ж�ͬһ���Ƿ��У���Ϊ�������ǵ��߼���ֻ����һ�аڷ�һ���ʺ�
    for ($j = 0; $j < 8; $j++) {
        if ($array[$j][$column] == 1) {
            //�����������һ���󵱣� ������Ҫ�ȵ��� ��ͬ�У���ͬ�еġ����Ա仯��Ӧ���� ��һ���±ꡣ�տ�ʼд д���˵ڶ����±�
            //�����һ���£������Լ��⣬���б�����ӣ���Σ��
            return false;
        }
    }

    //��2�����ж�б�ߣ�б����Ҫ�ֳɣ����ϣ����£����ϣ��������ֱ�����жϡ�
    //2.1, ���ϣ� ��������������С
    for ($i = $row, $j = $column; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    //2.2, ���£� �������� ������С
    for ($i = $row, $j = $column; $i < 8 && $j >= 0; $i++, $j--) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    //2.3, ���ϣ� ������С�� ��������
    for ($i = $row, $j = $column; $i >= 0 && $j < 8; $i--, $j++) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    //2.4, ���£� �������� ��������
    for ($i = $row, $j = $column; $i < 8 && $j < 8; $i++, $j++) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    return true;
}

/**
 * �˻ʺ��Ų�
 * @param int $row ��ʾ��ʼ�У�
 * @param int $column ��ʾ���ж�����
 * @param array $array ��ά����
 */
function EightQueen($row = 0, $column = 0, $array = [])
{
    $i          = $j = 0;
    $printArray = []; //�ı��� ���� ��Ϊ ��Ҫ��ӡ������Ū�˸��±�����Ҳ���Բ���
    //��һ������ԭ�����ʼ��һ����ά����, �û����û�չʾ���̵�
    for ($i = 0; $i < 8; $i++) {
        for ($j = 0; $j < 8; $j++) {
            $printArray[$i][$j] = $array[$i][$j];
        }
    }
    if ($row == 8) {
        for ($i = 0; $i < 8; $i++) {
            for ($j = 0; $j < 8; $j++) {
                printf("%d ", $printArray[$i][$j]);
            }
            printf("\n");
        }
        printf("\n");
        //�Ѿ������±�Ϊ8��ʱ���ˣ������֮ǰ���еİڷŶ��ǿ��еģ�����countNumber��һ
        $GLOBALS['countNumber']++;
    } else {
        //�ڶ��������ûʺ�λ��
        for ($j = 0; $j < $column; $j++) {
            if (notDangerous($row, $j, $printArray)) {
                //��δ���ǳ���Ҫ����Ҫ�ú�����¡�û����δ��룬���Ǵ���ġ�
                //
                for ($n = 0; $n < 8; $n++) {
                    $printArray[$row][$n] = 0;
                }
                $printArray[$row][$j] = 1;
                EightQueen($row + 1, $column, $printArray);
            }
        }
    }

}

$tempArray = [];
//��һ������ʼ��һ����ά����
for ($i = 0; $i < 8; $i++) {
    for ($j = 0; $j < 8; $j++) {
        $tempArray[$i][$j] = 0;
    }
}
EightQueen(0, 8, $tempArray);
echo $countNumber;