<?php include "header.php"; ?>
            <div class="row">
                <div class="span12 topTabs">
                    <ul id="topTabs" class="nav nav-tabs">
                      <li><a href="#main" data-toggle="tab">Main</a></li>
                      <li class="pull-right"><a href="#about" data-toggle="tab">About</a></li>
                      <li class="pull-right"><a href="#pricing" data-toggle="tab">Pricing</a></li>                  
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="main">
                            <h2>Main</h2>
                            <p>In tortor neque, ullamcorper eget fermentum vel, consectetur vitae lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p> 
                            
                            <p>Phasellus volutpat ultrices magna vitae laoreet. Praesent risus nulla, rutrum at placerat sed, faucibus sed turpis. Nulla eget porta erat. Cras facilisis turpis est, at tincidunt ligula. 
                            Donec fermentum dui vitae dui feugiat varius. In faucibus dictum augue, nec pharetra erat tincidunt sit amet.</p> 
                            <ol>
                                <li>In ultricies dictum augue,</li> 
                                <li>ac rhoncus urna dapibus eget.</li>
                            </ol>
                            <p>Sed ipsum diam, lacinia et ullamcorper in, eleifend ac justo. Duis sagittis metus sit amet dolor suscipit elementum. Mauris libero mauris, posuere in consectetur elementum, sodales et arcu.</p>
                        </div>
                        <div class="tab-pane" id="pricing">
                            <h2>Pricing</h2>
                            <p>Stuff description</p>
                        </div>
                        <div class="tab-pane" id="about">
                            <h2>About</h2>
                            <p>Stuff description</p>
                        </div>
                    </div>
                </div>      
            </div>
            <br />
            <h2><button id="toggleFiles" class="btn"><i class="icon-chevron-up"></i></button> My Files <span id="filesSummary" class="hide">(12 files, 238Gb of <a href="/account#currentSpaceHeader">250Gb</a>). </span></h2>
            <div id="filesContent" class="row">
                <div class="filesFixedSize">
                <div class="span4">
                    <div id="myFiles" class="my-files">
                        <table class="table">
                            <tr>
                            	<td><input type="checkbox" /></td>
                            	<td class="filename"><span title="ALX_TGACCA_L002_R1_001.fastq.gz.md5">ALX_TGACCA_L002_R1_001.fastq.gz.md5</span></td>
                            	<td class="filesize">3Gb</td>
                            </tr>
                                                        <tr>
                            	<td><input type="checkbox" /></td>
                            	<td class="filename">Filename2.fq</td>
                            	<td class="filesize">3Gb</td>
                            </tr>
                                                        <tr>
                            	<td><input type="checkbox" /></td>
                            	<td class="filename">Filename3.fq</td>
                            	<td class="filesize">3Gb</td>
                            </tr>
                                                        <tr>
                            	<td><input type="checkbox" /></td>
                            	<td class="filename">Filename4.fq</td>
                            	<td class="filesize">3Gb</td>
                            </tr>
                                                        <tr>
                            	<td><input type="checkbox" /></td>
                            	<td class="filename">Filename5.fq</td>
                            	<td class="filesize">3Gb</td>
                            </tr>
                                                        <tr>
                            	<td><input type="checkbox" /></td>
                            	<td class="filename">Filename6.fq</td>
                            	<td class="filesize">3Gb</td>
                            </tr>
                        </table>
                    </div>
                    <br />
                    <button class="btn" id="selectAllFiles">Select All</button>
                    <button class="btn hide" id="deselectAllFiles">Deselect All</button>
                    <button class="btn btn-danger pull-right" id="deleteFiles">Delete</button>
                </div>
                <div class="span4">
                    <form action="#" class="dropzone">
                      <p>Drag and drop raw data (fq, fq.gz) or reference files (fasta)</p>
                      <div class="fallback">
                        <input class="hide" name="file" type="file" multiple />
                      </div>
                    </form>
                    <input name="file" type="file" multiple />
                    
                    <p id="slowConnection"><small><a href="/slow">Slow connection?</a></small>
                    <div id="slowConnectionDescription"  class="hide">                  
                        <p>Russian Federation,<br />
                        index, Moscow,<br />
                        Kakayato-street, dom-office.<br />
                        Binom ltd.</p>
                        <p>It is strongly recommended to use express courier service instead of EMS/USPS. Your hard drive will be shipped back after file transfer free of charge.</p>    
                    </div>
                    </p>
                    
                </div>
                <div class="span4">
                    <select name="genome" id="refSelect">
                        <option>Select reference</option>
                        <option></option>
                        <option value="human">Homo sapiens (human)</option>
                        <option <?php if (!(isset($user) && $user != '')) {?>style="color: gray;"<? }?> value="genbank">GenBank reference</option>
                        <option <?php if (!(isset($user) && $user != '')) {?>style="color: gray;"<? }?> value="custom">Custom reference</option>
                    </select>
                    <div id="genBank" class="hide">
                        <?php if (isset($user) && $user != '') {?>
                        <label>Enter GenBank accession number<br />
                         <input id="genBankNumber" type="text" />
                        </label>
                        <p><small>Reference name (if exists)</small></p>
                        <div class="alert alert-danger hide">
                        Accession number not found!
                        </div>
                        <?php } else { ?>
                        <p>To select GenBank reference please <a href="/account/new">register</a></p>
                        <? }?>
                    </div>
                    <ul id="refList" class="unstyled">
                        <?php if (isset($user) && $user != '') {?>
                        <li id="ref-1"><label class="checkbox inline"><input name="genome2" disabled title="Select Custom reference to use this file as a reference" type="radio"> <span title="ALX_TGACCA_L002_R1_001.fastq.gz.md5">ALX_TGACCA_L002_R1_001.fastq.gz.md5</span></label> <button data-refid="1" class="btn btn-mini btn-danger deleteRef">&times;</button></li>
                        <li id="ref-2"><label class="checkbox inline"><input name="genome2" disabled title="Select Custom reference to use this file as a reference" type="radio"> <span title="ALX_TGACCA_L002_R1_001.fastq.gz.md5">ALX_TGACCA_L002_R1_001.fastq.gz.md5</span></label> <button data-refid="2" class="btn btn-mini btn-danger deleteRef">&times;</button></li>
                        <li class="alert alert-info hide">&larr; Drag and drop files here</li>
                         <?php } else { ?>
                        <li class="hide registerNotice">To upload custom reference please <a href="/account/new">register</a></li>
                        <? }?>
                    </ul>
                </div>
                </div>
                <div class="span12 analysis">
                    <div class="before-analysis" id="before-analysis">
                        <p><button disabled id="analyzeStart" class="btn btn-large">Analyze</button></p>
<?php if (isset($user) && $user != '') {?>
        <p>Pricing: $<span id="pricing">300</span> </p>
<?php } else { ?>
        <p>It's free to try!</p>
<?php } ?> 
                        <p>Estimated time: <span id="estTime">0</span> min</p>
                    </div>
                    <div id="in-analysis" class="hide">
                            <p>Time left: <span id="timeLeft"></span></p>
                            <div class="progress progress-striped active">
                              <div class="bar" style="width: 0%;"></div>
                            </div>
                    </div>
                    <div id="after-analysis" class="hide">
                            <h2 class="alert alert-success">Done</h2>
                            <p>Share the news:</p>                           
                    </div>
                </div>  
                
            </div>

            <div class="row" id="resultsRow">
            	<div class="span12">
                    <h2><button id="toggleResults" class="btn"><i class="icon-chevron-up"></i></button> My results</h2>
                    <div id="resultsStart"></div>
                    <div id="resultsContent" class="hide">
                    <table id="results" class="table">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th><a data-sort="Name" href="#">Name</a></th>
                            <th><a data-sort="Time" href="#">Date</a></th>
                            <th><a data-sort="Call" href="#">Variant call</a></th>
                            <th><a data-sort="Annotation" href="#">Varian annotation</a></th>
                            <th><a data-sort="Consensus" href="#">Consensus genome</a></th>
                        </tr>
                        </thead>
                        <?php for ($i = 1; $i < 25; $i++) {?>
                        <tr>
                            <td><input class="delete-result" data-result="<?php echo $i; ?>" type="checkbox" /></td>
                        	<td class="resultName"><a href="#">Result <?php echo $i; ?></a></td>
                        	<td class="resultTime"><?php echo rand(1, 31);?>/01/01 <?php echo rand(1, 24);?>:27</td>
                        	<td class="resultCall">12Mb <a href="#"><i class="icon-download"></i></a></td>
                        	<td class="resultAnnotation">28Mb <a href="#"><i class="icon-download"></i></a></td>
                        	<td class="resultConsensus">3Gb <br /> <a class="btn" href="#">generate & download</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <table id="resultsOverlay" class="table table-hover">
                    </table>
                    <button class="btn" id="selectAllResults">Select All</button>
                    <button class="btn hide" id="deselectAllResults">Deselect All</button>
                    <button id="deleteResults" class="btn btn-danger pull-right">Delete</button>
                    </div>
                </div>
            </div>
<?php include "footer.php"; ?>
