  /**
                    *�ϴ�excel
                    *$filename �ϴ��ļ�����Ӧ��nameֵ
                    *���� ��ŵ�·��   �� /www/wwwroot/51jplg/niushop_b2c_free_2.2/upload/excelfile/20190617/95f994cbf8b1c31672426f92be631507.xlsx
      */
     private  function  saveExcel($filename='file'){
         // ��ȡ���ϴ��ļ�
         //dump(request());die();
         $saveRoot=ROOT_PATH.'upload'.DS.'excelfile';//����ĸ�·��
         $filename=$filename;//������ļ�
         $file = request()->file($filename);
         if(empty($file)) {
             echo ('�ϴ�����������');die();
         }
         // �ƶ������Ӧ�ø�Ŀ¼/public/uploads/ Ŀ¼��
         $info = $file->move($saveRoot);
         //���������ļ��ϴ��ľ������������ֱ�Ӵ�ӡ$info���鿴
         //��ȡ�ļ����ļ�������$info->getFilename()  ***********��֮ͬ�����ʼǱʼ�Ŷ
         //��ȡ�ļ�������/�ļ�������$info->getSaveName()  **********��֮ͬ�����ʼǱʼ�Ŷ
         $filename = $info->getSaveName();  //�ڲ��Ե�ʱ��Ҳ����ֱ�Ӵ�ӡ�ļ��������鿴
         if($filename){
             $quanpath=$saveRoot.DS.$info->getSaveName();
             return ($quanpath);
         }else{
             // �ϴ�ʧ�ܻ�ȡ������Ϣ
             $this->error($file->getError());
             die();
         }

     }