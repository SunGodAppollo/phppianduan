 /**
     * 导出excel
     */
    private function outexcel($data)
    {
        $excel = new \PHPExcel();
        //基本信息
        $excel->getProperties()->setCreator("作者")
            ->setLastModifiedBy("最后更改者")
            ->setTitle("文档标题")
            ->setSubject("文档主题")
            ->setDescription("文档的描述信息")
            ->setKeywords("设置文档关键词")
            ->setCategory("设置文档的分类");

        //字段名
        $excel->setActiveSheetIndex(0)
            ->setCellValue('A1', '订单编号')
            ->setCellValue('B1', '收货人')
            ->setCellValue('C1', '货物名称')
            ->setCellValue('D1', '订单状态')
            ->setCellValue('E1', '支付方式')
            ->setCellValue('F1', '海关申报状态')
            ->setCellValue('G1', '是否申报')
            ->setCellValue('H1', '下单时间');
        //添加数据
       
        //下载excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="store.xls"');
        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $objWriter->save('php://output');
        $excel->disconnectWorksheets();
    }
