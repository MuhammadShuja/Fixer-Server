<div class="row" style="margin-bottom: 20px;">
    <div class="col-md-12">
        <div class="toolbar-c">
            <ul class="nav nav-tabs">
                <li>
                    <a onclick="hidePanel()" id="btnPrint"><i class="fa fa-print"></i> Print</a>
                </li>
                <li>
                    <a onclick="showPanel(this)" href="#tabExport" data-toggle="tab"><i class="fa fa-upload"></i> Export</a>
                </li>
            </ul>
            <div class="tab-content hide" style="padding: 10px;" id="toolbarPanel">
                <div class="tab-pane" id="tabExport">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn font-grey-mint" id="btnCopy"><i class="fa fa-clipboard"></i> Copy</a>
                            <a class="btn font-grey-mint" id="btnCSV"><i class="fa fa-file-text-o"></i> CSV</a>
                            <a class="btn font-grey-mint" id="btnXLS"><i class="fa fa-file-excel-o"></i> XLS</a>
                            <a class="btn font-grey-mint" id="btnPDF"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            <a class="btn font-blue-c pull-right" onclick="hidePanel()">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>