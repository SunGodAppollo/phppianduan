  /**
                    *上传excel
                    *$filename 上传文件所对应的name值
                    *返回 存放的路径   如 /www/wwwroot/51jplg/niushop_b2c_free_2.2/upload/excelfile/20190617/95f994cbf8b1c31672426f92be631507.xlsx
      */
     private  function  saveExcel($filename='file'){
         // 获取表单上传文件
         //dump(request());die();
         $saveRoot=ROOT_PATH.'upload'.DS.'excelfile';//保存的根路径
         $filename=$filename;//保存的文件
         $file = request()->file($filename);
         if(empty($file)) {
             echo ('上传错误请重试');die();
         }
         // 移动到框架应用根目录/public/uploads/ 目录下
         $info = $file->move($saveRoot);
         //如果不清楚文件上传的具体键名，可以直接打印$info来查看
         //获取文件（文件名），$info->getFilename()  ***********不同之处，笔记笔记哦
         //获取文件（日期/文件名），$info->getSaveName()  **********不同之处，笔记笔记哦
         $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看
         if($filename){
             $quanpath=$saveRoot.DS.$info->getSaveName();
             return ($quanpath);
         }else{
             // 上传失败获取错误信息
             $this->error($file->getError());
             die();
         }

     }