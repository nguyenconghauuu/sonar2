<?php

namespace App\Http\Controllers\Frontend;

use App\Questions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\CategoryPosts;
class ExamsController extends FrontendController
{
    protected $postAbout;
    public function __construct()
    {
        parent::__construct();
        $this->postAbout = DB::table('posts_about')->orderBy('id','DESC')->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * show ra  CHAO MUNG BAN DEN VS HE THONG
     * THI THU
     */
    public function index()
    {
        $cateModel = new CategoryPosts();
        $categorys = DB::table('categoryposts')->get();
        $sortCategory = array();
        // gọi hàm đệ quy sắp xếp lai danh mục theo thứ tự
        $cateModel->recursive($categorys, $parent = 0 , $level = 1, $sortCategory);
        $postAbout = $this->postAbout;

        return view('frontend.exams.create',compact('sortCategory','postAbout'));
    }

    public function createExams(Request $request)
    {

        $user = Auth::guard('web')->check();
        if( ! $user)
        {
            return redirect()->back()->with('danger',' Mời bạn đăng nhập để thực hiện chức năng này !');
        }
        $idUser = Auth::guard('web')->user()->id;
        $data_exam = [
            'e_code' => str_random(10),
            'e_level' => 1,
            'e_user_id' => 1
        ];
        $idExams = DB::table('exams')->insertGetId($data_exam);

        $exams = $this->createExamsLevel1();

        if ($exams && $idExams )
        {
            foreach($exams as $item)
            {
                $data_user_exam = [
                    'eu_exam_id' => $idExams,
                    'eu_question_id' => $item->id
                ];
                DB::table('exams_users')->insert($data_user_exam);
            }
            return redirect()->route('vaothi',[$idUser,$idExams]);
        }

    }

    /**
     * vao thi
     */
    public function startExams(Request $request)
    {
    
        $cateModel = new CategoryPosts();
        $categorys = DB::table('categoryposts')->get();
        $sortCategory = array();
        // gọi hàm đệ quy sắp xếp lai danh mục theo thứ tự
        $cateModel->recursive($categorys, $parent = 0 , $level = 1, $sortCategory);

        $idUser = Auth::guard('web')->user()->id;
        $idExams = $request->idde;
        $idQuest = DB::table('exams_users')->where('eu_exam_id',$idExams)->get();
        $cauHoi = [];
        foreach ($idQuest as $item)
        {
            $cauHoi[] = DB::table('questions')->where('id',$item->eu_question_id)->first();
        }
        return view('frontend.exams.start_baithi',compact('cauHoi','sortCategory','categorys'));
    }

    /**
     * luu dap an nguoo dung va show lai man hinh
     *  Luu kết quả làm bài của user
     */
    public function saveExams( Request $request)
    {
        $cateModel = new CategoryPosts();
        $categorys = DB::table('categoryposts')->get();
        $sortCategory = array();
        // gọi hàm đệ quy sắp xếp lai danh mục theo thứ tự
        $cateModel->recursive($categorys, $parent = 0 , $level = 1, $sortCategory);
    
        $data = $request->all();
        unset($data['_token']);
        $cauHoi  = [];
        $count  = 0;

        $id_dethi = $request->segment(4);
        
        foreach ($data as $key => $item)
        {
            $idQuest = (int)str_replace('dapan-','',$key);
            $checkQuest = Questions::find($idQuest);
         
            if( $checkQuest->qs_answer_true == $item )
            {
                $cauHoi[$checkQuest->id] = [
                    'check' => true,
                    'dapan' => $item
                ];
                $count ++ ;
            }
            else
            {
                $cauHoi[$checkQuest->id] = [
                    'check' => false,
                    'dapan' => $item
                ];
            }
        }
        
        $ketqua = [];
        // lay danh sach cau hoi cua de ti
        $list_id_exam = DB::table('exams_users')->where('eu_exam_id',$id_dethi)->get();
        foreach($list_id_exam as $item)
        {
            if(array_key_exists($item->eu_question_id,$cauHoi))
            {
                $ketquan[] = [
                    'data' => DB::table('questions')->where('id',$item->eu_question_id)->first(),
                    'dapan' => $cauHoi[$item->eu_question_id]
                ];
            }else
            {
                $ketquan[] = [
                    'data' => DB::table('questions')->where('id',$item->eu_question_id)->first(),
                    'dapan' => [
                        'check' => 'none',
                        'dapan' => 'none'
                    ]
                ];
            }

        }
        DB::table('exam_result')->insert([
            'er_user_id' => Auth::guard('web')->user()->id,
            'er_point'   => $count,
            'er_exam_id' => $id_dethi
        ]);
        $socauchulam = 40 - count($data);
        return view('frontend.exams.result',compact('ketquan','count','socauchulam','sortCategory','categorys'));
    }
    /**
     * tao cau hoi cap 1
     * @return array
     */
    public function createExamsLevel1()
    {
        $arrayQuest = config('questionArray');

        // query chuong  1
        $question = DB::table('questions')
            ->inRandomOrder()
            ->limit(100)
            ->get()->toArray();

        return $question;
    }
}


