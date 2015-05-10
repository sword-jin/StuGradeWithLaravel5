<?php namespace App\Http\Controllers\Admin;

use App\Grade;
use App\User;
use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ExcelController extends Controller {

    /**
     * 得到学生名单，下载excel文档
     */
    public function stuList()
    {
        $users = $this->getUsersDatas();

        Excel::create('学生信息表', function($excel) use($users) {

            $excel->sheet('sheetName', function($sheet) use($users) {

                    $sheet->fromArray($users, null, 'A1', false, false);

                    $sheet->prependRow(1, array(
                        '学号', '姓名', '性别', '手机', '班级', '邮箱'
                    ));
                    $sheet->setWidth([
                        'A' => 11,
                        'B' => 8,
                        'C' => 5,
                        'D' => 12,
                        'E' => 9,
                        'F' => 20,
                        ]);
                    $sheet->getDefaultStyle();

            });

        })->export('xls');
    }

    /**
     * @return 学生信息数组
     */
    public function getUsersDatas()
    {
        return User::where('is_admin', 0)
                    ->select('id', 'name', 'sex', 'phone', 'pro_class', 'email')
                    ->get()
                    ->toArray();
    }

    /**
     * 得到成绩表
     */
    public function grade()
    {
        $grades = $this->getGradeDatas();

        Excel::create('学生成绩表', function($excel) use($grades) {

            $excel->sheet('sheetName', function($sheet) use($grades) {

                $sheet->fromArray($grades, null, 'A1', false, false);

                $sheet->prependRow(1, array(
                    '学号', '姓名', '高数', '英语', 'C语言', '体育', '思修', '软件'
                    ));

                $sheet->setWidth([
                    'A' => 11,
                    'B' => 10,
                    'C' => 5,
                    'D' => 5,
                    'E' => 6,
                    'F' => 5,
                    'G' => 5,
                    'H' => 5,
                    ]);

            });
        })->export('xls');

    }

    /**
     * 获取学生成绩数组
     */
    public function getGradeDatas()
    {
        $grades = Grade::select('user_id', 'id', 'math',
            'english', 'c', 'sport', 'think', 'soft')->get()->toArray();

        foreach ($grades as $key => $value) {
            $grades[$key]['id'] = User::findOrFail($value['user_id'])->name;
        }

        return $grades;

    }

}
