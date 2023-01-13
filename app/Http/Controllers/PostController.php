<?php

namespace App\Http\Controllers;

use App\Models\Disannghethuat;
use App\Models\Post;
use App\Models\Video;
use App\Models\Thuvienanh;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\Image;

class PostController extends Controller
{
    public function danhmuc($slug)
    {
        $danhmuc = Danhmuc::all();
        foreach ($danhmuc as $dm) {
            if (Danhmuc::where('danhmuc_id', $dm->id)->count() > 0) {
                $dm->con = Danhmuc::where('danhmuc_id', $dm->id)->get();
            };
        };
        return $danhmuc;
        return view('posts.trangchinh', [
            // 'chiTiet' => $chiTiet,
            // 'danhmuc' => $danhmuc,
            'danhmuc' => $danhmuc,
        ]);
    }
    public function trangchu()
    {
        // Hoat dong tu phap id =22
        $baiviet_id = DB::table('post_tag')->where('tag_id', 22)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }

        $hdtuphap = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(3)->get();

        // Hoat dong co so id =24
        $baiviet_id = DB::table('post_tag')->where('tag_id', 24)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $hdcoso = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(3)->get();

        // Tin noi bat id =25
        $baiviet_id = DB::table('post_tag')->where('tag_id', 25)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $tinnoibatnb = Post::orderBy('id', 'desc')->whereIn('id', $arr)->first();
        $tinnoibat = Post::orderBy('id', 'desc')->whereIn('id', $arr)->where('id', '!=', $tinnoibatnb->id)->where(function ($query) {
            $query->where('noibat', '2')
                ->orWhere('noibat', null);
        })->take(5)->get();

        // Tin tuc tu phap id =44
        $baiviet_id = DB::table('post_tag')->where('tag_id', 25)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $tintuctuphap = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(3)->get();
        // Chỉ đạo hướng dẫn id = 92
        $baiviet_id = DB::table('post_tag')->where('tag_id', 92)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $chidaohuongdan = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(3)->get();
        // Văn bản pháp luật mới dẫn id = 93
        $baiviet_id = DB::table('post_tag')->where('tag_id', 93)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $vanbanphapluatmoi = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(3)->get();

        // Thông báo id = 84
        $baiviet_id = DB::table('post_tag')->where('tag_id', 84)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $thongbao = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(5)->get();
        
        // Thông báo đấu giá id = 144
        $baiviet_id = DB::table('post_tag')->where('tag_id', 144)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $thongbaodaugia = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(5)->get();
        
        // phổ biến giao dục pháp luật dẫn id = 54
        $baiviet_id = DB::table('post_tag')->where('tag_id', 54)->get();
        $arr = [];
        foreach ($baiviet_id as $bv) {
            $arr[]  = $bv->post_id;
        }
        $phobienphapluat = Post::orderBy('id', 'desc')->whereIn('id', $arr)->take(3)->get();
        $video = Video::orderBy('id', 'desc')->paginate(10);
        $image = Thuvienanh::orderBy('id', 'desc')->first();
        $danhsachvideo = [];
        foreach($video as $p)
        {
            $chuoi = explode(".", $p->linkyoutube);
            if($chuoi[1] == 'mp4')
            {
                $danhsachvideo[] = $p;
            }               
        }
        // return $tinnoibatnb;
        return view('posts.trangchinh', [
            'tinnoibatnb' => $tinnoibatnb,
            'tinnoibat' => $tinnoibat,
            'hdtuphap' => $hdtuphap,
            'tintuctuphap' => $tintuctuphap,
            'hdcoso' => $hdcoso,
            'chidaohuongdan' => $chidaohuongdan,
            'vanbanphapluatmoi' => $vanbanphapluatmoi,
            'phobienphapluat' => $phobienphapluat,
            'danhsachvideo' => $danhsachvideo,
            'thongbao' =>$thongbao,
            'thongbaodaugia' => $thongbaodaugia,
            'image' => $image
        ]);
    }
}
