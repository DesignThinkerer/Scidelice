<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.2
*/function
adminer_errors($bc,$cc){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$cc);}error_reporting(6135);set_error_handler('adminer_errors',E_WARNING);$tc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($tc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Jg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Jg)$$X=$Jg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){if(!preg_match('~^[`\'"[]~',$u))return$u;$_d=substr($u,-1);return
str_replace($_d.$_d,$_d,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Ve,$tc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($y,$X)=each($Ve)){foreach($X
as$sd=>$W){unset($Ve[$y][$sd]);if(is_array($W)){$Ve[$y][stripslashes($sd)]=$W;$Ve[]=&$Ve[$y][stripslashes($sd)];}else$Ve[$y][stripslashes($sd)]=($tc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Ga=false){static$wg=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Ga?array_flip($wg):$wg));}function
min_version($Vg,$Md="",$i=null){global$h;if(!$i)$i=$h;$Df=$i->server_info;if($Md&&preg_match('~([\d.]+)-MariaDB~',$Df,$A)){$Df=$A[1];$Vg=$Md;}return(version_compare($Df,$Vg)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Mf,$vg="\n"){return"<script".nonce().">$Mf</script>$vg";}function
script_src($Og){return"<script src='".h($Og)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($B,$Y,$Ua,$wd="",$ne="",$Xa="",$xd=""){$H="<input type='checkbox' name='$B' value='".h($Y)."'".($Ua?" checked":"").($xd?" aria-labelledby='$xd'":"").">".($ne?script("qsl('input').onclick = function () { $ne };",""):"");return($wd!=""||$Xa?"<label".($Xa?" class='$Xa'":"").">$H".h($wd)."</label>":$H);}function
optionlist($C,$yf=null,$Rg=false){$H="";foreach($C
as$sd=>$W){$te=array($sd=>$W);if(is_array($W)){$H.='<optgroup label="'.h($sd).'">';$te=$W;}foreach($te
as$y=>$X)$H.='<option'.($Rg||is_string($y)?' value="'.h($y).'"':'').(($Rg||is_string($y)?(string)$y:$X)===$yf?' selected':'').'>'.h($X);if(is_array($W))$H.='</optgroup>';}return$H;}function
html_select($B,$C,$Y="",$me=true,$xd=""){if($me)return"<select name='".h($B)."'".($xd?" aria-labelledby='$xd'":"").">".optionlist($C,$Y)."</select>".(is_string($me)?script("qsl('select').onchange = function () { $me };",""):"");$H="";foreach($C
as$y=>$X)$H.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$H;}function
select_input($Ba,$C,$Y="",$me="",$Me=""){$eg=($C?"select":"input");return"<$eg$Ba".($C?"><option value=''>$Me".optionlist($C,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Me'>").($me?script("qsl('$eg').onchange = $me;",""):"");}function
confirm($Ud="",$zf="qsl('input')"){return
script("$zf.onclick = function () { return confirm('".($Ud?js_escape($Ud):lang(0))."'); };","");}function
print_fieldset($t,$Bd,$Yg=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$Bd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Yg?"":" class='hidden'").">\n";}function
generate_linksbar($Fd){$Gd="<p class='links'>";foreach($Fd
as$y=>$_){if($y!==key(array_keys($Fd)))$Gd.="<span class='separator'>|</span>";$Gd.=$_;}$Gd.="</p>";return$Gd;}function
bold($Na,$Xa=""){return($Na?" class='active $Xa'":($Xa?" class='$Xa'":""));}function
odd($H=' class="odd"'){static$s=0;if(!$H)$s=-1;return($s++%2?$H:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$uc=true;if($uc)echo"{";if($y!=""){echo($uc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$uc=false;}else{echo"\n}\n";$uc=true;}}function
ini_bool($jd){$X=ini_get($jd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$H;if($H===null)$H=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$H;}function
set_password($Ug,$M,$V,$E){$_SESSION["pwds"][$Ug][$M][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$H=get_session("pwds");if(is_array($H))$H=($_COOKIE["adminer_key"]?decrypt_string($H[0],$_COOKIE["adminer_key"]):false);return$H;}function
q($P){global$h;return$h->quote($P);}function
get_vals($F,$e=0){global$h;$H=array();$G=$h->query($F);if(is_object($G)){while($I=$G->fetch_row())$H[]=$I[$e];}return$H;}function
get_key_vals($F,$i=null,$Gf=true){global$h;if(!is_object($i))$i=$h;$H=array();$G=$i->query($F);if(is_object($G)){while($I=$G->fetch_row()){if($Gf)$H[$I[0]]=$I[1];else$H[]=$I[0];}}return$H;}function
get_rows($F,$i=null,$n="<p class='error'>"){global$h;$kb=(is_object($i)?$i:$h);$H=array();$G=$kb->query($F);if(is_object($G)){while($I=$G->fetch_assoc())$H[]=$I;}elseif(!$G&&!is_object($i)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$H;}function
unique_array($I,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$H=array();foreach($v["columns"]as$y){if(!isset($I[$y]))continue
2;$H[$y]=$I[$y];}return$H;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$p=array()){global$h,$x;$H=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$H[]=$e.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$H[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$H[]=escape_key($y)." IS NULL";return
implode(" AND ",$H);}function
where_check($X,$p=array()){parse_str($X,$Sa);remove_slashes(array(&$Sa));return
where($Sa,$p);}function
where_link($s,$e,$Y,$pe="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$pe:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$K=array()){$H="";foreach($f
as$y=>$X){if($K&&!in_array(idf_escape($y),$K))continue;$za=convert_field($p[$y]);if($za)$H.=", $za AS ".idf_escape($y);}return$H;}function
cookie($B,$Y,$Ed=2592000){global$aa;return
header("Set-Cookie: $B=".urlencode($Y).($Ed?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ed)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($zc=false){$Qg=ini_bool("session.use_cookies");if(!$Qg||$zc){session_write_close();if($Qg&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Ug,$M,$V,$l=null){global$Mb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Mb))."|username|".($l!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Ug!="server"||$M!=""?urlencode($Ug)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Hd,$Ud=null){if($Ud!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Hd!==null?$Hd:$_SERVER["REQUEST_URI"]))][]=$Ud;}if($Hd!==null){if($Hd=="")$Hd=".";header("Location: $Hd");exit;}}function
query_redirect($F,$Hd,$Ud,$ff=true,$gc=true,$mc=false,$lg=""){global$h,$n,$b;if($gc){$Sf=microtime(true);$mc=!$h->query($F);$lg=format_time($Sf);}$Pf="";if($F)$Pf=$b->messageQuery($F,$lg,$mc);if($mc){$n=error().$Pf.script("messagesPrint();");return
false;}if($ff)redirect($Hd,$Ud.$Pf);return
true;}function
queries($F){global$h;static$Ze=array();static$Sf;if(!$Sf)$Sf=microtime(true);if($F===null)return
array(implode("\n",$Ze),format_time($Sf));$Ze[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$h->query($F);}function
apply_queries($F,$S,$dc='table'){foreach($S
as$Q){if(!queries("$F ".$dc($Q)))return
false;}return
true;}function
queries_redirect($Hd,$Ud,$ff){list($Ze,$lg)=queries(null);return
query_redirect($Ze,$Hd,$Ud,$ff,false,!$ff,$lg);}function
format_time($Sf){return
lang(1,max(0,microtime(true)-$Sf));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($De=""){return
substr(preg_replace("~(?<=[?&])($De".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$zb){return" ".($D==$zb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$Cb=false){$rc=$_FILES[$y];if(!$rc)return
null;foreach($rc
as$y=>$X)$rc[$y]=(array)$X;$H='';foreach($rc["error"]as$y=>$n){if($n)return$n;$B=$rc["name"][$y];$sg=$rc["tmp_name"][$y];$qb=file_get_contents($Cb&&preg_match('~\.gz$~',$B)?"compress.zlib://$sg":$sg);if($Cb){$Sf=substr($qb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Sf,$gf))$qb=iconv("utf-16","utf-8",$qb);elseif($Sf=="\xEF\xBB\xBF")$qb=substr($qb,3);$H.=$qb."\n\n";}else$H.=$qb;}return$H;}function
upload_error($n){$Rd=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Rd?" ".lang(3,$Rd):""):lang(4));}function
repeat_pattern($Je,$Cd){return
str_repeat("$Je{0,65535}",$Cd/65535)."$Je{0,".($Cd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$Cd=80,$Yf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Cd).")($)?)u",$P,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Cd).")($)?)",$P,$A);return
h($A[1]).$Yf.(isset($A[2])?"":"<i>â€¦</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Ve,$ad=array(),$Qe=''){$H=false;foreach($Ve
as$y=>$X){if(!in_array($y,$ad)){if(is_array($X))hidden_fields($X,array(),$y);else{$H=true;echo'<input type="hidden" name="'.h($Qe?$Qe."[$y]":$y).'" value="'.h($X).'">';}}}return$H;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$nc=false){$H=table_status($Q,$nc);return($H?$H:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$H=array();foreach($b->foreignKeys($Q)as$Cc){foreach($Cc["source"]as$X)$H[$X][]=$Cc;}return$H;}function
enum_input($T,$Ba,$o,$Y,$Xb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Od);$H=($Xb!==null?"<label><input type='$T'$Ba value='$Xb'".((is_array($Y)?in_array($Xb,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Od[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$H.=" <label><input type='$T'$Ba value='".($s+1)."'".($Ua?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$H;}function
input($o,$Y,$r){global$U,$b,$x;$B=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$r="json";}$lf=($x=="mssql"&&$o["auto_increment"]);if($lf&&!$_POST["save"])$r=null;$Ic=(isset($_GET["select"])||$lf?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ba=" name='fields[$B]'";if($o["type"]=="enum")echo
h($Ic[""])."<td>".$b->editInput($_GET["edit"],$o,$Ba,$Y);else{$Pc=(in_array($r,$Ic)||isset($Ic[$r]));echo(count($Ic)>1?"<select name='function[$B]'>".optionlist($Ic,$r===null||$Pc?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Ic))).'<td>';$ld=$b->editInput($_GET["edit"],$o,$Ba,$Y);if($ld!="")echo$ld;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ba value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ba value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Od);foreach($Od[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($Ua?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($ig=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($ig&&$x!="sqlite")$Ba.=" cols='50' rows='12'";else{$J=min(12,substr_count($Y,"\n")+1);$Ba.=" cols='30' rows='$J'".($J==1?" style='height: 1.2em;'":"");}echo"<textarea$Ba>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ba cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Td=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$A)?((preg_match("~binary~",$o["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Td+=7;echo"<input".((!$Pc||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Td?" data-maxlength='$Td'":"").(preg_match('~char|binary~',$o["type"])&&$Td>20?" size='40'":"")."$Ba>";}echo$b->editHint($_GET["edit"],$o,$Y);$uc=0;foreach($Ic
as$y=>$X){if($y===""||!$X)break;$uc++;}if($uc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $uc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$rc=get_file("fields-$u");if(!is_string($rc))return
false;return$m->quoteBinary($rc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$H=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$H[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$H;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$Af="<ul>\n";foreach(table_status('',true)as$Q=>$R){$B=$b->tableName($R);if(isset($R["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$G=$h->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$G||$G->fetch_row()){$Te="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$Af<li>".($G?$Te:"<p class='error'>$Te: ".error())."\n";$Af="";}}}echo($Af?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Yc,$Yd=false){global$b;$H=$b->dumpHeaders($Yc,$Yd);$_e=$_POST["output"];if($_e!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Yc).".$H".($_e!="file"&&preg_match('~^[0-9a-z]+$~',$_e)?".$_e":""));session_write_close();ob_flush();flush();return$H;}function
dump_csv($I){foreach($I
as$y=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$I[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$I)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$H=ini_get("upload_tmp_dir");if(!$H){if(function_exists('sys_get_temp_dir'))$H=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$H=dirname($q);unlink($q);}}return$H;}function
file_open_lock($q){$Gc=@fopen($q,"r+");if(!$Gc){$Gc=@fopen($q,"w");if(!$Gc)return;chmod($q,0660);}flock($Gc,LOCK_EX);return$Gc;}function
file_write_unlock($Gc,$_b){rewind($Gc);fwrite($Gc,$_b);ftruncate($Gc,strlen($_b));flock($Gc,LOCK_UN);fclose($Gc);}function
password_file($ub){$q=get_temp_dir()."/adminer.key";$H=@file_get_contents($q);if($H||!$ub)return$H;$Gc=@fopen($q,"w");if($Gc){chmod($q,0660);$H=rand_string();fwrite($Gc,$H);fclose($Gc);}return$H;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$jg){global$b;if(is_array($X)){$H="";foreach($X
as$sd=>$W)$H.="<tr>".($X!=array_values($X)?"<th>".h($sd):"")."<td>".select_value($W,$_,$o,$jg);return"<table cellspacing='0'>$H</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$H=$b->editVal($X,$o);if($H!==null){if(!is_utf8($H))$H="\0";elseif($jg!=""&&is_shortable($o))$H=shorten_utf8($H,max(0,+$jg));else$H=h($H);}return$b->selectVal($H,$_,$o,$X);}function
is_mail($Ub){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Je="$_a+(\\.$_a+)*@($Lb?\\.)+$Lb";return
is_string($Ub)&&preg_match("(^$Je(,\\s*$Je)*\$)i",$Ub);}function
is_url($P){$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Lb?\\.)+$Lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$pd,$Jc){global$x;$F=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($pd&&($x=="sql"||count($Jc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Jc).")$F":"SELECT COUNT(*)".($pd?" FROM (SELECT 1$F GROUP BY ".implode(", ",$Jc).") x":$F));}function
slow_query($F){global$b,$ug,$m;$l=$b->database();$mg=$b->queryTimeout();$Jf=$m->slowQuery($F,$mg);if(!$Jf&&support("kill")&&is_object($i=connect())&&($l==""||$i->select_db($l))){$vd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$vd,'&token=',$ug,'\');
}, ',1000*$mg,');
</script>
';}else$i=null;ob_flush();flush();$H=@get_key_vals(($Jf?$Jf:$F),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$H;}function
get_token(){$cf=rand(1,1e6);return($cf^$_SESSION["token"]).":$cf";}function
verify_token(){list($ug,$cf)=explode(":",$_POST["token"]);return($cf^$_SESSION["token"])==$ug;}function
lzw_decompress($La){$Jb=256;$Ma=8;$Za=array();$nf=0;$of=0;for($s=0;$s<strlen($La);$s++){$nf=($nf<<8)+ord($La[$s]);$of+=8;if($of>=$Ma){$of-=$Ma;$Za[]=$nf>>$of;$nf&=(1<<$of)-1;$Jb++;if($Jb>>$Ma)$Ma++;}}$Ib=range("\0","\xFF");$H="";foreach($Za
as$s=>$Ya){$Tb=$Ib[$Ya];if(!isset($Tb))$Tb=$hh.$hh[0];$H.=$Tb;if($s)$Ib[]=$hh.$Tb[0];$hh=$Tb;}return$H;}function
on_help($fb,$Hf=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $fb, $Hf) }, onmouseout: helpMouseout});","");}function
edit_form($Q,$p,$I,$Mg){global$b,$x,$ug,$n;$cg=$b->tableName(table_status1($Q,true));page_header(($Mg?lang(10):lang(11)),$n,array("select"=>array($Q,$cg)),$cg);$b->editRowPrint($Q,$p,$I,$Mg);if($I===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$B=>$o){echo"<tr><th>".$b->fieldName($o);$Db=$_GET["set"][bracket_escape($B)];if($Db===null){$Db=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Db,$gf))$Db=$gf[1];}$Y=($I!==null?($I[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($I[$B])?array_sum($I[$B]):+$I[$B]):(is_bool($I[$B])?+$I[$B]:$I[$B])):(!$Mg&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Db)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$B]:($Mg&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Mg&&$Y==$o["default"]&&preg_match('~^[\w.]+\(~',$Y))$r="SQL";if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Mg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Mg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."â€¦', this); };"):"");}}echo($Mg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$ug,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0(\0Z\n‡Á |\"€Ñ˜Ü^=HdR9\$–M'”J\$h‚V-9KÊ%¢\0´	)œNgS¹äö}? P@±`:^Œ—½åïú\\½©2-K T*¥V­W¬VdRòD½ÁM–=eê	{FÀ-¦KòøMjİo¸\\hRğD½/~Ş%êkd^V.KÊRöÕİ‚¹bqX»Œ¼9/cÙÛòîˆ\n—¡eï«Ô³4B\0ñš=&–G/KÜÒ÷ô½3/Ö5öíXX–4Û½å¾^U—Ø¥”©a”²DTñ²À”½egeKÃŞ§Vu/6Ëß’÷T¼{Õ¨‹@rô>³	/õ½]b¹\0V—¼ÒÆÜ¼Oë­ñsr÷¼Jü@b^>>ai¤—ƒP\nN™%ç²^q%á	ª©xß™éx)\n:ébº–AÉa²éC‘*T–0ic¶–)éb'Éx–—Ÿ	yŒ,ˆAhGŠX%ç”—ƒÑì*–ŒèZS<.TŒë/àj^kH)x_'­Éxş³òÃÔ—“²P©/.\n‹B—–iyò—†Ó#F—Š)7@I`*—œiy®¢7S¢²—¹©aÊ—™\"À€\0ÓóH®IDuÙ%„Ä—…t{¨×%çÜÙK'©xiL¥ãí9(%€Š_A¥†:¢4UH-G/‚X_<ñÈW=ix²³‹µÃO@¢šB—Š;|–u\n^`6•:^t%ç\"^è¥“˜Ù`È?Ëğ‚À%æš–\0õğ\0-ÛõZÈ¥†@°!€†–L)atª\nâ\râ—iyÒ—’ÔbX?ÉxP—†ix¼——¶|dª%öJX¼¥ˆ’>—‡p(Ñs2(”’¥äÚ^^'âè÷¥ä‚^dB*¥İNXv¥âj~Ç@¡ö@–‰y¸¿€µ_¥†ƒpŞI\"_I%†n–I|–ìJ^\"áÉc§… úÎgahsŠôR^;IxÆ”¥äu¦ÌÀ*^o%áËv—’©yË%˜:X´…¡ŠJ+UÔa%æpIÒ2^C%çz_>Áid–»à[¬%†J£Ãnûí¢,ˆwØ–c;ú^ôáh­%œp†›?‰y/Íaq‰[Äák²–­\r}ĞO%Ö‹tšXØ¥8¬…³œz—‡ë;¿®Ë8kÖğ—²i`9Ö’+.åIcú–&ñ*^Iv½ZœÖp	¹µİl·jûédöKKJ%‰H–²X!Ÿ88@­Ù§f`I`ß%âQˆÇrX -G —´’\0KÄ	//ô¥BXÈyD\0Ä¼¬³¸_ÀÉ?<'Œ–!X\"™/H°Ö’ÀË”:ê\r\$¼v\$¡æj’«–„ˆŒ–'˜šKÇ¢,Ä°)\0ZÓhÑhî5K’Àá™¾G&aŠ’ğÈKÉ‰,a¤°<BAªÊIxu%á„—ƒH«8-E µ‚Øb®I`°%âú‚_d\0-ä±JÅĞZ•,\nÇT,¨wîK:Z²7)I:K|”€—2XSD©%‰¦UÊ [+iõÒºX_ ¤·—Ræ^Ùq/¥ÜÀ%‚¾\$‚Ø×0¦D¿™D¼V’ğ;AhŸFÒ‰×6”rñå0-h0–¸fôİ›â¬—Š‚^’RA/\nó~pÎVKÄLìSŠzØlCq/\n“ê~É÷?Œ/3B|’Ç\$TI¦%âq³Iccç—é¢Å»\"Bg€&”—ÎBX.y,ld²ˆ\$¶†Kå-nh¯êNK(I9|Ø—‹‚^(Ö!}.E±„gBV -+<òY9˜›ø•¤°Rñ˜¨\\ÓuUL¶¹h¥,d¼µ’ÁÖRIxf-ç„º’Å4K]\nPRi,™éŠ‚Ø?9+Íß,f¹N*£€”¤w¼@Z´–¹ ¬‡’H‚ĞhV\"ÛĞFŒÜÆäî‰`kŠÀ\$—˜wøï\\à-sÀø÷ºÑBYÜ\0Du­ø5`	*°i¼g8ò‹_E!ª™Æ¡L<`ÎDø%Hl¨EQ!:Öó\rÜĞ~?„\$Ğâ®KÅı7¶Dºİ!è¬q‰`òÄÙÍ5XÑËUw²ÂI»Ğ†	xsA<ıØ¬KÅa/ÖÊ–Õ@qŸØ-PÈ³^ùWk-€@¶b\"‚Bá/õ\0€¯Qó°š¨}îy,dK¶ÙÂÎìpˆ-.ä°e1s	….%‚]0jjKÃA/¼1H2_\"ÁkÛ›3nª&Ü3É`Ø¶A(³ºÌ3‰	`Á,H‡Û¡‹Ùñç%‘Lß xiŠG¦>ê‚Öu†\\¸-6È,6›‹†Mz³\\Ïœ\r\$ ƒ¨(-¡qÂÁâá‘¡#·¿	2<ÇEAhËÀ´Êá˜èK©¹jÄ±’È¢·×.	\$½^çrxËìx-¡‰Ú+:û‡—ÎX-ZÀ´wèí<O1.UÇÚeÈ(-?©ÉÁ/…œè0ZÛ¦¨ÖD˜—ƒâÎõp”jZÏ^ZZş®D¼fëİŒG‰xA,ù_LÕ ZˆAh©YSÔ’ı±Ğ£“ÅD½ä’ÃÊK+ÖÕÏT–YòYkt2pÆÖ&_É`57lS\"¤Kä,Ç„³#É›sT‡ ¶\"äş‰¹5Ò €’ËóAkëƒ#Æ£âÂÄxÑÄ¾Ğ™ÉxÓÏn@‚Û`(£‰/ß`´LÜ¨ìn \$¾öÁKĞÍf,óÜI·UVüöÊß¬±è—Š¢_ÅKDÅ¦Ä°=½B_œ÷©AA²WN“,É`vßüşnK…T“8Œ—„v^úŒ‰x¡i S„vŒ‚µúŒ’ÃŸ¥Ájk%‚¸—„Ì¡ÚSğZø&ÃıÌz´}âÈÓÉiûf‹=_€åı\"ø\rÎ!»‘@­„Ò^ÓÑg·õ×AyoM]-¥ùà½_Ö?ğZw§öZ€–àKZï»Ì’ÿ|?ÿ¾øCüx\0ÿ‡ï‡\0øãü@€?–ÆÇÀ<xÿ†?\0øøø?|ÿ±ğÇ¾øßpûáğÆ¾ı?óÿËğ¿ğøCøûáñüşßİ÷ÿXüìÿüÿ/†ş¡ş/†üoŞ÷Á÷ÁÆï’Ú`~\0÷Áà!ğp0ï³°À~ğıáøà>Ï½}àşÀòşğ]ü/ï\0! ƒ°' kĞj\0ğŒĞk	°	p›	Œ\"ğ¤ğ©°jÀıáøáÀ€|\0ğ¡\0aşÀø€Ã\0/îÀx€âà\rğâşğë ñğÀÃé‘ÀoíĞñï³‘/–ñøñ!ñ#\0q*øO²üo|²\0ø€\0ş \0ùP¼\0íÁş\0¶á¯œû€÷Áü\0a\0ùaï†ø¯–ÿÏ|");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\næCÉìÆo6ÎC£‘œÄ(\"#HìÄa1šÌç#yÔÜdÌÒ1Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Îsƒ˜´ç54™‡fÓ4ÒngsIèhM¦óĞ´Ìi:`òƒ,¢·]¯¬ö›YÒÚtŸL0hD*B0\rF&3îìx´™°s‘†'¤æ[É„tv4œíS%òà0XL¨èÙW5ú)ÈY–Ìf®Ò\r^·=~9g0Æ\\@·ŒÇrìQËNnÊ^…ØyNÖj{æo±p®C%ÈÊ‹GS™ Zh¡œ5ZÎ|>:«ø'·ƒé b{“J)Æ“Ñ”t1Ë*uS=^²È2*ã8t(Ú0R,…8¡j:ƒxÚûÀ@9¡\nè@‡1\nJ“­#¸Ê4ŒãBRÉJ Ø¼ËğFÆˆ²0#\"B2Ç‹ÈĞ>#æú¾ïÈJıªÊÀ`Iaa„hbC0\rĞ4Ar›&°ß\nBĞÄ54ã\$>À+Q‹A6Do”MELŠFÈÊ6£é©=¡œƒ9DñLW;§óŠÒÍHˆfı*’Kï.IjĞú“E£İ\"şÉKÈé5ƒÄ6£Ú¸¯,‹#Óoõ-PÔu-Z¬A°\\(R°|À9-H@Ø0\nxtóWö(øÑo£ì•Èãí>+ãÜ¾âÌĞÜ;5DÀ°8e.Áœg\r”o=ÇAxÊ:)üP¬Tƒ3Ø¯Œ°Ahİ­8Î¬kºk+[’Í½p·é{Yø=Ar¢óÔs>„súò³¨c\":p æ8WãËĞ78ì£Z£©#`[w_aÔ*8`Äµ‚ÁrØÛ\$S<˜æd™]ZŒ¡4CÖÈr¼ÓøÿfAo\rW#èÒ6ŒãŞF¤'ù=ô¬\rªèÉRg‰«ÿgMZ~¢ªmN¸ÉÒxğıì¯è”í2¨úƒ±W6>\$T{g H%î…¹Ã•î2Zèó¿¼mmï†\\ø~óuèÎIV¹Õ,876ƒyP·+İûÕir`™,l–6Œ9*¸à:`ÅÖB£v¤šäš®Q¬kZå§0±°#¸²­·—A–åÕus3#¨ÙŒ [+»\rã½«ŸC^Ä?ëÏ:ÍÈâ:-Ë;è©ÃG©ë{_l¡ó{ÃwWğl•\$³hı˜Éêúò‡´üsòy!Ü0‡ŞHÃÚñ%)I6< ŞlXTI¡Ö:˜Øt!À2ƒĞNÃ¨bk!Ğ…ĞöğĞ(-Ná%xROT4,maô§ª@Æôƒ¼@A¥ß¼×\nÆmmM’µeŞšÊkŒL4±V.øb(`ïÁ˜7A8c<eèÂW&§dBàÙ¹1@ØÅŠ0 /l„ï¨TêÒËË§\rÀ¸§ …C”_*ğ¨2¯'€•U˜-†	Ö\\¨Ãyc&e@Pu\"Ì†5¦h“›s@÷RC>ÉC æphkE´ã%'¥\$á°‚±©Ç¹É;R|`ê]på¢ƒ¨&B ªyG\rá?B¥Ğ2éq¡¥Â¥¤{ee„˜L¶fe3Õ1¡ÁÁÊS\$æÛ‹Z’lÎ€„å›jšQbœ€Wè:sÊsMÅ?;Üïu	Ù¨™°MHäyMÄ0İ0Ù†ºC3{Ô\0…\0Äİ¨;\$eId6hÜ¡çê/›´2‡2–Õ-#hğ7L%ĞÄ#ì²£”x0Òî¨•\$–/æ“8âCDä55Àº•ÑõK2;9fSEZ%Æ–å¤4Z*´ÈĞƒ\0n©¤Ø&åÚ¦TóSéÈn–õ2«„j±6W*¤À\0\\@Õçq³„`k[«t–‘hÅ†º`et#&rnË:óë²±¯õÖ¾?ŠÖºX”Ø(ôr™¢ˆ¿èªŒ>ÀÜıM€ÌG¡¼:n#2™{%4·ŠQå|Ä{?!ª™Fiê–ÒÙæß! ÔTÅÁT°VÖÙËÍB¡q¡Í€Şxn“ğÔÅ±‹pñA¼-ê¢_:Àßo\$”Mê\rEÁ¥Hz	§0³`Œr‹u(³o‘ä 2H`æUû¶w0ƒ„îÕã½‡Î?¶»\"²ºªY ¸¤I[”Ò«n†8µĞjNéç'!Ø<ÈkúV\rÀø\$Ü©±d¯Yq×*l\0ØÑCuHqÀI“Ï—P@È6HğjB¨\\­H>Xc…ğ³N£´ÔCH¸(& Ôd<Š\rr .äW4úZ}™	U¤n—pQBÉ\"db`\nAa\"\$`¥*¶weƒ~)p@ø @í„©¶b˜ğ¹)Y@Ì1>i.Î\n3F†1 fš–Ç5ÉòöçheŸSÆoÍ¹BC9Ïí7c»PPv+—†B_†Éƒ AŞ7ĞD%7% a\\Í/ U¨O.î¾PP»THeR*vQêàÃiu¾ÌáYZ¿àå/Xr? ƒ,1ÉÛdl¢ñœp-ÓZÅ• Àh” R»A¼ÜHÖ\"\r€ U3,:¤áÁ,£b\r ,\r!X!ğ¤Á€KúD ïĞ‚‚˜U\r*†}ü÷öıü ,ïà„}Cpr\$p¬B˜WA()…0ŞxG	ãûô\"„^IÂx7	\n<—“ïîSË‚(Dß¡7ƒ„~C?1å»ô!pöB7;|ÓpïĞ:Uá!, ó®›Ây3å|‡‰ïĞ†øHMç< !xHa!“tş¬\nøOi<„‚ƒ˜SßÁç„…pñÛ‚Dï!BˆIïAÔ&…@ƒá×^ï!\$;„ĞÔA°MÈ…NqáB¨6	Á,ù^zğBãıÅs¾Ô‚Ğk\n<Û¤ˆ0	ÁG€ù°’y@È-\0ÄúPA	 3 ŠB˜M	ß&…`ÍæB¸i	Dƒ Š(I\ná'†OCˆF\n¡¼(†ğ¬ÂX7\nÄ,„€˜0zõáL# ÆXD&–pb\n û„	\0¬àŒ\n Ìï ğ	À°À¦€Àìj\0¤€pÀğ\n\0rã ò ‚€¤Ä\\\r ğDPX\0Â\nC2ÀŠ\n€@¬€˜+€Î@l š	 ¥À´\rÀl\0ˆ	`´àÀh Ş  @f€¤«@­ æ\0¤\n Ü	 Ú f+€p\n`ô\n8€hàf\r\0l\0r	 jàğ	à\nà­ÀÒ	 V	@ğàòÀ’\n\0Š\r@b@®\0f@Îp@hB¾	 à`Â	@ï„ f\r€œ\r µ\0àò\nàÊ	 Ş€Ş Ö@j\n æ@Ø\r\0Ì	®4à¬`´`bàp\r\0ÆàÆ ä	`šSàà€Ò	mì\nm`¤ ò Ò\r Ğæ@è\n@®\rOÎ\n€–\n@Ş\n\0V@Ğ	\0fÂ\0˜	@j`â@Ö\nàš@Œ Ò\n €^€àô bp6\n€ä\r(\n@Ô\n V\nà˜@– „`bàôàV Ò@ Ê ^\0Ú€`\r€ä`¦Gà³\$@¦ b€’\r ¤\0ˆÀœ\rÀ„¢	€Ö\n\0Ê÷ „`Ğà`Şo' ^\n€¦àÌP:\n\0l	@ê ¢	Àp€`	€f\r r€Ä`ğ`Ö€Ö	g›0à¦ î\n â€æ€²0¢ñ ê`µ pê@Àò@²(Îˆ b€Â\nÀ¤0 \r\0€à\rOv\0ê ®\n@ì Ú\n ê  îí@‚\0¡\r ï2@œ@´\0¢ó,\nÂr\nài\r²æì	 Î ®\n0Ú\r‘l\n€¨@œì€œWà\r€’- ”\r€ª`à	à¬àœÀÂ@š ´`’à Ò\$€à€Ä\0„“N\n@ĞöäT÷àj@K0Ú\r àe8à\r³Ó>`bŒà í%`„“ÖEOî\n@ä\n\0¦	@²\n€¬í`¢P@Nå*rğ€† 3@Ù:@Ò	 V`Ó3àÆ\r ¤\r \r€”°]? ÄîÀê`ô\0ò@-°¸\r\0`ğÀ™0¢lB€ô	¨B`”\rÀ˜@Š \n€×0õ0\0Ô	 éCôB	€°	Àj@İ<€ËBtV š\r3²\ràÎğ@ñEôbÀ¤âÀõ\0”÷Àeô¥DSÜ\r Ä`¬	%t8ío½EUE“»;ó}7’~ ‘% ÆƒX	‚b@™=Óá8õ\"	ÀìRN€²\0ƒ0\0¦€ïQÒSG ’	o½OÀ‘<à> Ü	À`\n@°Tõ@¢Q î	àÒ.\rÔ2S)2Ó04’¨\rt`p\0˜\rU;À¤±v\n ì\n Ú\nÀõNà¬5… ÉZ ê†\r4ûL`‡P\0ñEtZ\r`²UQ aQu`„0`ÚôƒHu U\nÑV\nóïK\0¥RŒğ€¦ÅCµÉ\\ÕĞü\n¯@€•V­ïWt”wR È÷Õ9^ô‰\r4£YOÕË;ÕE a6À´\r¶!bUoW5wW³'2³/25‡*_e ³SÕAT•LáÇU2±UsÔ\rÔ\0•ÛQUÕ=5#=ïwR€ÛRÕ055S–uT óTµN¤6à¨\n aM\0 Ô•ü\r–\0	@¥hÀÒ@dyõà	ÀàS¹5³8	àÕXÔ@Ğğ Ö ™2`Øğ¨nöÀbà	Àô	 d	€¨àîU˜×lD4¿kV}3S9köÂã3Ò€Öh\nÖÕm—=T ÚÃöì\rõµ\0ï1`Ö\0´\r avsz\r \n b	´b€\nñ7: b\r\0æO@”\rÖ	°\r@Çd6@\0‹q \rpA6Ö2„NáM6ÉlÕÿK7S'÷WR6o;‘8ïWg2àd	à†Ï¤\n€¤\r`œ@£xR¼3ªl\rµ„7¥ ÕaÀµIW¨	  W²@íC÷–Ù6×mÕ¥`km#a6ğ³\0à¦\n’KõA6”ÅOø>\n4F@çStCNà”– 	³l0T·s×%±4\n³¸\n¸-9\0g<“¾0Ú\r@‹}ò½Và‰z4¼\r@Î7’?µÆ	 Š€•A\0‚À­Z òvßRàÕ„ Ó/Àš`h@:ÖzíwH\r‘8\r@à\n>\r–ÑK Ñ8É„ §‡V¹o7ñEï¶d\n¯v çbVğ@’ğ\rvn <`ÑF\n  «<—H\n¸ñò\$ò\nüO0óO8óÀäò@’ò.e’VŠ\0œ÷vnd\0‹†\0ÙOt¼ïSÕY€go@ŠkzöõAy€@–@‚6ô î	 Ô˜Şà¡’w®	×²\rİˆx\"\rÀ×CvTàqNtG8 Æ\n™¥kyÅœP¯gÏoUÕaVSæÖË8xú)\0dû€µ6ø\0‘Ubæ	Àß2X7Ÿ³q%v\rõQ Yéu´Wˆ`Ğ„S‚à:h–>x3l\n/\"\rU„óvıx\0ª”\n iqOe—r4×2àèò@«I,\rvSl/¸Q\\–DáàÈ ¬X(®÷”kŸt^\n Œõ\0®?9‚Ùğo\ní`—˜/|\rÀ­šXÿšv¶x†ÀÈ\rÚ<€d\rÑŒ°ïY”¼7r	ÚØš\n0\n€Şö@Ô\rğ3/®ï:ÀíL:yš€‡A´Î\n d\nĞ7ƒ¹ÅX´£šù³›s(y½œÖ\nLÏ;M5­M”İQ4à›(¨	Zm€§rJ`Ôâ‹;“½<ÄÉ°Õmd[q°;k·;w·[o·Ûy·û{¸{…¸»ƒ¸îœ;¸™¸›‘¹Û›¹{¡º{¥º ƒ«›­º;Ÿ»;©»{½»[Áº`ƒ…;¹¼»¿»»Ã¼ÛÓ¼û¡Û×½ûÑ¾;Õ¾[Ù¸û±¾»á¾{õ¿é¼;Ç¿;ù¿|À{ûºİÀ¼ÁÁ|¾ü	Á<!Áœ¹»ÿÂ|-Â<Â[—Àü1Âü5Ãü3ÁÜ=Ã<IÄ|Â¼;Å<AÄÛÕÃœWÅ\\KÆÄ\\eÆ¼_ÆôÇÅqÅœwÆÛÅÜcÇ¼…È:yÆœ‡Çœ‰ÄÜuÉ<}É‘ÈÉ¼¥¾¼Ä›Tà^¯qyÀdˆÏ\\¶Ğ\rº3z` @j\n ÉèáÀÚ	@™%®¼àï€ƒ€ÎÀÂ¯àóÀû@±0#òßÀŞ\\Ü\n\0®á …ˆx¶\n°\0 î`˜•>\n2`\0¢\rn%Ôè\0«€ \nÀÙ%\"OÑÚäp:\n€ÚPê@\n ”ü@™ „VĞé@¦ì	 –\n€oàÚ\r@d\0‚ Ğ\nÀ—L@œ	z²°j\n@–`—|yÀÊ	p„.dXm<\0”#0\r\0â	€`#`¬	ÀœQà—@ÓÓ€¨àÂ ä¢kC@È	+ÚÀÜ@Ü V ”\n»6\r\0jvSß€ìàŸGà™Ì½^ğ\0Ò	@”\nÀê@Å!1ºàhßâ6à \r Ğrº	>+# äş€Ê\n ¨ j î±Ì`˜ğàŠnŞ ‚	 p ÅE åzSFöÑš@Â ©ç@€Š@ß'`Ş	Às nàš@!³Š3]é\0îp‰ÓüşúŞ¾\0rà @d ˜àÈí\0Ö`…\0è	Oä\rœëQ`ˆ\n „ h€Øà×Hà§ƒpÆ(`Ì\nÀ«\\à¤\$æ¤Àh@borgÀîà©-|ê\n oî@ à”	 …Ï@ÛÎ@Ü\r@–¸ÓÑ l\nc»7W† †\r€s×ı`¾`´@Û&`Î€ˆ@Œ@o}âOJì@…áxÎX´?Ù\0œà [®	à‚ æ Ø0@b\rÀî`ÒŞ\0Ù™öÀ€k€c[ ’\0ò¾².J\0Õ©rˆ€îå™@Vp°:­u r À’€2<`KE  ¢ea:h,†'	ŒxxÒF8÷€8€@p0%¾d BGp\0”çP9œÅ7àOj¶Ÿª§B3UØŒÎ¸(`;õ`wcÀ”4è!é€6ˆ€¤ 5\0¬\0HH¡Ò”6e\\õëGLĞ@â€ü‰dÀqpĞıçŠ%}àf@€Æ *t xm2@´&U-ÜàFÒl°7 	!9mş€òwÀmè HyĞ\0p°6Ÿ|\nÀLˆ\0ì¦“†§ˆıë9zAG61ñF€N(@`8˜bÀp€ä­'·,`/8ğÀğ`7€Ä\n`6Ë@ vğ<œuİàyŠíUŒà¸ f~è\0²46ğxM.€)Àø€Tº¸\0¬ôp+Rî¨À£t5¼Ğ\r@9S€`¥E¬‰êy¨@p\0=)\0FRR”P8¼Åüêœ>Š„[`xÀâÅGŸ ŒŞ 5A‹à`!L\n C±(€ìu b„;°\0à p `‚#Ø¥`\n`L@€Ôƒ­¨\n	˜hÀ^°½ LŠ“Ã7;q¬Gys7Àˆ%€ä\rÀq{0ÂŠÁBìÌ˜@²gœ@”\rÀT¸\rÀ’ 8,àÉŠÈÈú°6î–p@¥@'13€NTĞ 6§ñåk KhW @D£¨.Z\0Æıø'D8\0Tx ½\rS÷	`v]øñ• 05˜@BO\0ã¶ğ(Ô\nmÈ€ğ²<ì@7Bú\0–W‹\0¬\0v]+è€ìı¸”:Dà1uyÀ\0@3P	àhAb@ÚĞAÓ ÀfôD6¾(ŠåJÑB@ĞK¢@\n@t €¨d_ÁMç\0RƒÌ\0jé -è\n\0s]jZÏ†•ï¨l	@jsÈš°¾öÕ¥àKÁ–ÈD((¸\0rªrNş &\$È,,6J\0\0”H×¹Í‚€h’Z€n…\0¾ÔŞ8z#a,ùµj#øàQ¸šÜÀ³1A`nÂŞÖõ¤\0Ø«@/…˜À\0)©à‰0³ï°sp6Cğ\r`S¨a\"0T¦¬h@@ã8AL#°]ÃvÑÛ†˜¦Ï!È¯	¦=£|D#C&Aü‘¹IP«@ ˜M p9™„V¤™	Ìè%¡›‰tfb³ùŒd&Y4\\Cá„.Øäî\\\"(¦OEw\$øiÈ’êäºä±5\\Ê;)5Ğ(eÅ/dƒşTA‰@J‚!ğ%VSSnÊ˜\$d0)±Œ“g2Wõ6|­¤k^ŠäÛÄ6ğU\rÀn \0œÜÁè–0MÖnĞ‹›¼Ş&ó7©½Íòo³‘›ôà8!Ëá~oè¹0á +	¤O]æ×7€ÁÎ.s{_şç‡=ø	K¸`@¢˜`¸	èQyh@È˜`¤\$0R¡ÜÅ€0\r«'°\rO¶¬ˆp¿ÜìVË¦C#H.x‚©à2i J8@˜4Ÿ‰@S‰òÙì0(Y†ÀYê6€æs„¼@U`À†øJÜ hÀÀªò0àd´|@^ô^§¤(±”P¨\0Ü 2™ J>¢R´gXD‰@³bQ,OfË69³M’mSi›dÚ&İ6u< 1x\0‚† \" t<kÎ@ğ ! WtJ”g7†8 c:^\0˜“˜¾	µpÒ9B€ô„ñ”â`O‚˜€Î¥ã¦¨l\n®¬B_O\"€‡¡GÀgfÀUæğ2©ÄìÚÀê‡D„\$å€C @Ä&A\r€qÀ’*—Ww²mÀbSÒšÀ‚ˆ\$z<`	cB\nÒÆ¢)…Àf`\0=\rÍ²˜’\09\0à\n) ¸Òxt`4¬ÄÈM\0§!ğ!µ(`/ˆÕp%<à\nà+Ä‡ÀĞo´ß¿\r3±èW\0ÀŒœÀ#<v7ê/XÖÀÎp;€­#à/‰ƒ¸•Ï 8BÈG©€ƒ@ŒÔÆ¬*\$} €Ê@š!\0É\"?¼t¦°€½Œª›>@À‰ 4œ}K @˜GâÄ\n)/\0j€87S½yÀè†bOA}\nsÙyĞ\0`~À\"Ä\nJ,:<qH´ğ)¿‰(Ğˆ£Õ è·,D®f /¢Îx¶7ú8ğï˜ó€ˆÉ°IxHR	ÈÍÅÈ	`1H@Ê“À14¥‚€h@`\rAıÂùCã\0ä\n wP¤.\0È÷( <±\r…H@æ·[L‘óJ—¤+€Šs•©¢€9±ÃÀÅBà+¨3	*NŒQ\0 ™&Â¤Ó[ØšF¸	¨mœ1\0˜è0!ş–æ!DJÂ¥ \r¦KÀ³,IØRó½@Ê€0€Ä\0SJĞh\n\0\"ÎH¨Ÿòï\0â ;\0Î O‰/€rôú¥ë¨bØ\ri€,\0¬PqW²»À °7™E—A S( 3\0ÊpAÈ\"tR\0002§é*Éİ)ºÀlP*\r'û{z)ÕZ8¦ŸxÓyh.À¯h!?[˜RİS! \$5=¤Y”ªY@60\r”é¨\rQø— %=L\08P\rÀˆ\$œI#1+ ÀÜ2€İJ#E(Â¸Ä§…¬ PÌ_®ğ«X,>{ªˆ?Ğ\"\nñ8h€²§>ÕXÕ½`k~À Ö±\0o¬Pƒ\$„GXÇ.À©0)¯åW4 zĞã6™úÄ=¥¤@X @¢ª©Ì\n€d>›ş€4ş»ü 7¸€äˆ5ù%aP¯È\rB©Ôy©J rD(S®4È•\"JhQæô7…ğ z@ğ\$„ø:¸€èÌ€2‡l1OëĞJÃJvñ ’*rL/À­ )&,\rÀ3EÃÍEğ(`.êh\0ñ\\¥!¥L\n J€@ëJ•p7Ñıy J¥Áğ*–ı :\0ä e8@”†Ä_\0ÉòÀl¤]ı 5³=àÈ¯ª ™~äz<\nœ`8VÜ°7ŸM#4ÕÄ;\0‚P8°\rÉTÂ_@†ãÔR,`3¨\0lœ¤Ÿ4«ÀTv°\$Xğb¾ yL8\r@ò‚».ó±zŒ<€ä`%AQ	qÈ\rÌ–ÚÆÁ€\nàa;ıÀâ©òÍJ¨€p“I8ó:zoÀÖĞ¾\$àE»^\0h[G \ntz…¾@1	rÀYpkH ÖK¨ÀğAt˜!~P94	³å‰s2éHÌª&ÃnÔö©µYìÓ:›WòÔ¶³µU«-ok›XÚšÇö´µõ«€ck]Û\rç”«˜\0ªÀ;;v?Ò.ê4ïæh:ğ€s¦ªñq:9š%¸	›¸Æ@·zéñÀ4ÌhSL¶¨…¤á&õ§ù[Àì¦_ÄX)àjSZ(ŒÇK\0uª€nz÷ºÓVÃên:À¢R‚#íjuÏº	\0™ ;MÙ\$`MšbUÀÔWË\"1\0•=V‡¿T°)(¬ D’ŠÀÌç\$MÒôãÕÓµVuí?4\r\0004¥ÀBÉ7£ä-{zHğh.Ì\0~´ïVŒ·è	².Ç1ŠTr9¡ì0–Ò`HR\$œë3°\$!6»àkÔ›dq'<B\rÀD§Ãë\0äÒ 6®ü\r±Ö(\r\0lª\0Ù2@W­ñP„‚¥Ğ_>X(°@Ãö…°\r€¡03€Øl·ºã~&6\$1°<c@X !Ã:ñ5‡˜À¯65Ï^‚ôU’½-éï;X;ÕHNõˆ9½uê@¯zÙ^’öŒÚ½E`ÀÊ\nHŸ„T¤E³Àì[¶4@kjÈ’.Šƒß¥:6xv8\rààóÀN¬[hSî9j`„„\$	–°Àœ/°#ˆK\0o¼øÔW\"Ö¬¼Ò5H‘\0òôxI:ij ÀnVôÆàd(S:Œ\0/ju€JµÛ\0ˆpN²IÕØˆ\0i.Ğ@œ)ê…cg²æ2ü¥µÿ‚=R €;ºğÎác«·*Ñ`äJîÂ@g²¤<¬¯D0(|æı-¦©t¾Å>‘•»\"\"€Ö&:ZÑv`Ô\0Í2@5_øæ€XºrTßŒ0-9d	€s[µ@‘vZ¢7ŠÔÁŒ\0ÂĞ,¬!„\rê{`WD%20@/Ls¤ÀÌ(úS(	¨%€iªå^\$7a¾³@Œ@,Uá-Àg°ÃV|»\\[×V²¶U­m[‰dbRÕ½8[Àˆà;VüÚuT*¥N›{Òæ°€TnH 5¤Ø5C4õ€Ãë]‰æ«ù i08²ü‡ÊÀ'X %€ÌÉ\0Mx\"~€ë†Õ°&q]lÓB•ù“]†;o-€àğÂc%:¨ HJ42ÀV÷?€Ü0f0\"±SÓŸw–÷S(€òˆ\0¡{išJã,—|3×ÍS@/¼€¦È@BT¶RRw\$7í¹°@G¼fÀgV½¦`R^„3òp°+ÎH¸gz‘Şt«Šo€fuú!BˆºN0qQ´øa~„2;\ráB¥<^L³£šİ\nŠ–\0b˜7¯4Âv±¼*!9ô´NŞ^Ğ\rüäz\\‰'ƒ2NP¿Ôƒ`*€Y}ZL¢°Ô]ÚjJW˜@œozH²Ô€OÀŒƒ£áEwÓ‚j(˜v’ˆ9HP\rÀ–H8İï€4ePXmGÇ0	¹†f©Á_ÆS(`/ŸYäÀ¬#£Ä€\0bÀ\r™Ğ¸å‘ã 7¨UkÏ½£»(6&@€l+3QßŠx|ìÕË‡Ù \0Ğ#@8^YŞ{1RŠw¢là@Ú­ 75-#háSÀ\0çdÔ\nĞ' À÷µQ)pPee(\"Ü4€¾hàRKÂô©éC (Ğ”\r@ZªH¢~\$«âÄùçäNâ†€ağ:\0Ì\0Ox@cè®˜iÙu¨˜À’8DÔM¦fí ¿¨‡\0ÕôèE50¶`%`Ï=PX»™œc]°\nµ!,0©R‡J–4¦²à--ÉÜ€U@Ş\"¤/d@8ˆx\0ô09_şÂ fC@Àîp°+\0¾:ŠßH`_tè::gÔ4n`£ã`3€äæ€0Ëğ—l£à5\0½ÕyÉ`\r‚œ¤W01\\“êñõÄ	á¤øªANN”¢ØF#Uó1¿yå’!a¤Ëa`	2KÖ¢õ¨ÍGj7R“Ô~¥u%©mHêD	‘)Bªk\0è¡ê}‚‡iÚšgP5è–b`= ô”€G)á{oãƒ•gÑ*RüjUB•p”%[*ùa›VR´•„±%vl°É6WšÅ69´å‚3½`˜ Ûáö–D²ƒmiË<æî™´Íèoc|èß†ş–ÙÀÎ\noéo›ö\\/Û—¹NäæÇ79Á#Rì—sÜòç° \$ì’õ—ºåô…OÏÆ™é	Ï¬‘à<RlÉÎğOÆc‰Hro‹);²ŒN.¸Å1µ\\d0\0¤şq‚¡T	,\$1ÜªÂÙ,	ÀiÇ r„fyàg+x@Èp\0%6hÎ‹@nà8ÆÑßÀvBMıÀÂà Ä	#~LŒŒĞ9A}sk›~Õ&áµm¬M·jûZ›PÀmR%\\6.BxÂ`ûZP2>Ìâ4@Àš²,— UšÀ¬óÍ¤¾¾ƒÏ²9ëĞœp z\0ä«s´,nS—ıã—M3Ó…£ÛIˆBğÑ#cÈC&€C¡•§[ş7s	çLÑN½Cvà­3AÀ\r TPl¡dZ¥\"´Ñ;…Ûh\0r03\"Õ`Xm\0d;ó0	8¥k=ÀØğŸµ*ÀvVÒç{<V±d¬ÁŞLĞ£[»‘­“(ihJe¥Nîhh	0pü»][‰>e4?lCå_,•DÑ„\rby®ìqWÕÖà‘ !_aĞJ†@A@Ú 5ïnõn„…ÒÜyF_ÙKf825õ“Ú)Ø	@2?@1JYóÈ~HBx¨•˜¬àæSOáØ]b\0æÈ€°íñ(ŞğTó,g2`3«Â\r€îÛNF€	Ó%<HQ€V¤ŒÃXı\$®z©òØBPh/<Â“ R¶i&{ôŒMD`rJkø}ó¬NyÊj§4öcĞõ6<!]‘ÅDE]8#€¼«Ô•ª°³ºú˜ê}^GûÓ @È„n4°¿|£7ÖTSöÍÑ^`6N‡¨¼ÑP\"Ç}zo=A0ÀÍµıÜ–şñˆ ğ#	f³2@g FàXxnx€ğp: F	ĞLÈeÛE ,Ÿ˜x7çœóüRw,í¸RıËÅÀ‘ÁÀ:æp	 Z#\"e‚¢ìGCW<¨ÿBØÔ 	‡ÜM¶à¨šK°n+gF\$J @9âï‹àKmXúxvCrÔiIÌ\0Ãe#ä<ñ, d¦Ë\0Ø­¡Ü\\ÛGÛÊèP¸:\0À²às´7n±?tçò¸	ğ\n‘à€‡±1€­×Ò?0tP<#Æ·ó‚²§(õR 4¼ÄÎù‰ÑúÀô. :âùVLFİ\0fë‰m6‡A=¿\"wà2\0ä/ÿ{³@¨ó\0004\"¬€syó@ KÇœ@f\\rU•¿ÃÊÅÇ cÜ+œ³LŸtÌY àxp_<;¼Š\n	·¿ë–tæA^\$”¢›à€¥h\0006€ÜÑ¸Í4h¬‡0ähœCZ€¸6\"ŸK«`8Ğ;«\0ô`9˜\r™\0\$%^ØôÀ;¸	‹°·Ë[Ç´]ÍÙ(wn5%Eó5‘´|¡ÂP#ô*ap¦xÀl~¬R„Ä7é`=#E1È¯íq€ŠëûU«&PJyˆQïÕ*\"¤ú¤µŠa™Ğ\0\$nVà@Lz»å@¬«ñ€y_±ğÅ\$ÙeÑÃ¨D€¥à7\$úVFÀ°µŞl²Ñçsiô^òÇ--˜,ØDh^EŒl™V\n°@t>¨•Î±ˆ\n‰hw{\$»Ï L	hs¿èëÃÌ\$H„.É„Îí@J€<‘íCx»ãß7—¿ë“ÁCcü74î\$1_ı¬GŒ¿ì*{5Éâ\\Œ	µ\"Dyh›)Vı9ı“M*&`ñ»ÀÌ\"À9Ä¨¼%ĞÎfQkÇ„»fæ˜R²M@z°Ô€Â‰“.*Ì	¤Z@É^Ú<iö`Æˆ2Ô{©˜½;\nÙ’@Ê87XP5¼HÍ@òK+J{I¡Œä‘@Í#à-D¢iKen@\"±W@5£5¨PÙaÖ,wO›G¡A_:¼\rï<¯½€ÀŠÃ8«#3Ii€l›æ0Â”‘E(€sŞğîÎyñÇÍTX@”‚ÙôÔˆ3V©hÀ°”Ğ›\$§@TKr„Ã0\$‘5- qŒØçŒ¼}&.	¦hÒ&töùP6PÃ`Z#êqQÇú€¬ø®m6¿RàêQåÒyÏÏJp…\rËCæ“I-D:\0ñğ6e|áÄ@®¡q}£Öc½…#ÙóÀ°«ïƒânê><çPëD1mYC™:DŞ¿7<ôğŸI¾Q1`Ò\0±5á\0\0´×<\0	ß6ùÇ]ÀWó¿›üççÿ<úĞ>{ó¯¢|ûèßEúOÒ>ƒô¯¦ıéÿNú?Ô¾«ô¿¨}OêßLú×Ö>©õÏ«ıGëß[úÏØ~»ö/´}Ÿí_fûgØ>İö_·ı|\nOØœ¾À^Õ‹²€ÊpX\$Op@pø±Ry- w«Vq3¤Œ¿Æ°ğ¨ÈÅ¯ƒI“G@ÀFö×š)48=dÀdáãUª@W¸——œàD9GNÊòŸ–ÀNû3ÖJ0¨0Qfˆ'úş> µš_ı\\BE¾’©|˜YébÒA•´Û\ra³D\0Ü•ÕM4M@ÏÎ„Í1™Ò¬@Ôˆ£i[H€pRx[Wàk:¥#ûàmX¿Äx2;ûßè8ÿÌOï¢Å©\rşøfÍBßôoüÀNşù¡öşøÓÀ¿Îğ0pÈÿ@«P?à \"bpV”P?ğGƒL/úéD\0OşÔ0ƒN£üì3Ÿƒ¬°@ÒBôkU ğÒ0À(€ÂZQ\nÜBt›E`9ÄX[jA'ˆy4è¯\0æ£CÑ\0&!zÃîØÜØû„ä”pa¤«&\0b¸ó#Á<­7„å—Hw!ˆ^\0b¸©lNŠDÈ'¦B8³*ÅL4Ì×Òq.³¶&QD§ª]h\r'J¯ì¥ù>¶‰ûÆÄÊw\0¤½8P3€2­K¼K€î’Ÿèÿ:K¡¥j2´¬ªiƒÀÀz0Ç€Ôv0n•€¨ ‘äB(M\"\0‚ÉA&â·§ÍÃ+NÍœğ¯8ÀÌXm\$j\0¥¤ğ[AqÜP^Ákü0`HR·ä(^p\roÓ3r=`ßÏL¤”’bIÈ…\0NÕsV…5føM\\ˆÕÒOàûµx•X\r_„ªÖˆ“@ûµ‰#XáCµ”sYƒ5œ‚XI_5¦78Éd¥–ÖÈİm¥¢ÖèŞMo¥¬×[#×2[Ã„µÖ<øß©r×xç‰t5äs‘Î‡;%à×Áú¯L¥ì—Ã_à›«¼\nd„€Ê	[Öãò³N‹xIy¢…@+²BX	Nx\0†±Êô 5lPè\r\$ˆèF*iE8€’å\nF ™6É)\0¼»¾l8\n`3’¾Fpîà!6FdÙçÇG,‚{çs4öP	à­Ş9\0•¾M·ªß+`Š\rÀ(\0öÂ¥à¯†|#Rğ´µ2Ô¤-P¶5©‚} :˜Àgµ§Jv¨¤µ€Œ­1û\0<(|kµ¯Ÿ¨èX_¬\$‚\0ûJJäuÙ4#ô ²eÙ¨ª}ú×\0#\"v@\r‹q€î>p\n 4‘üv:çW„LOŠ*l^›Š€;\"4z±Sª\$0Tè¨«\0®z¬c\0¬ÕHx&`8²êk»¾TZ\0€9£t²±Ò)ì—\"Š@&ŠœÒ*å	©0P\r 9§~DI?h*Z™ˆ/Éªx€4³\0 \në.-¦6j\0  J %(\n\$¥'Fö2Ÿ\0:¸´›°	eb\0n ¾ëí\0Ê¸È\n@&\0²c° 04ÀØ«È…\0^ğØÅÎ:ê€âè„\0’Ã¨JW=¨Ê³µ¨‡ ¾Z(\0004	pR1Ë '.øë!Í )\0ÂûOH©à¯q@ÀšB§Ğ\rF6¹ªŠ\0\n(4¥à	 p¬8™k»€O\rAñ€Ú35\0µôM\0Iâ/²yHxÈñÈy \r¡ñ€jUÈÄæ’ Ù`&,”‘\rQá`\0¡è¦²\0ĞÃKä#,¡B´G¥–Œ›á¤\$˜'‹ƒã¤m”¶ Â+šR„'dÎnéJ€)\0æAQ< 1€ mÿ¸¬T²ë@ªfŞ`	’|Fi¦šÉ†h ¦Ã>j¸;zJ©9à3s«ØĞDE&XH?\0’ cü¡¬´(J®€¦°*ïÌ0Å*\n#\0Ü À« ×Ñé*x,\"ËNECyDœ	<ÈËÇ.Âf£ØÅ“€¨XÉ\0Ê?l>çÍ!Ò‘# =:ššï_'I¥d4˜Œ@˜gß¥œÎÜ:@9¬vh	\0002nw³5@2€êJ‚Mä’Ò(à§‘hÎòÊƒ€ğx«GŸ\rá‚ù€˜\n‹§X”\n)4ğ3Ô \0€¢¨™H@-6˜u¤½Lâ@7\rôUp\nèA€ğ(„’xL2Ïò ¤‘ ı€'ÅNv\0åéªà&Õnº'k\nökO[¡lğ˜.¼€îˆè¡\$µ3¶‹¨Ñ€ª/cõ—ìââˆĞ’>Š;å¶°ÔÀ	oÛÆ\$ëØéŒ4ÌÑĞT…Ú´tTp\$ËúÂy! 7¢PqeKá3>±8\r¤f (!Z=£ğ\n€Ò\"J®³\0ğAq-Ï€ŒBà\"ÀÅŒW@%Ê~‘+(j¢è±9l;•’9í€8³Tò	L{&3J‰í>ô¾JĞ`\0šŠò\r‹D€¢PY&.‘Òs:áÀ!ºÚõøeÉ ˜{é-,Ô4­‘dÙ\0„…øB'†¶¸ÉûÀ<¸‰¸ &\0¦ìÒ‰ì¨†wú9ˆÜ\0ÒtÈ'‘á.ô\0¬ ¨ß€ \r ¡îfy)EÇ,XåÒ¹¶xÒ•£(a*äõ€˜h\rpî3æš	ñ—îß˜qu\0”±]Š§üÀı\$w\0r‚\n·\0ŒQÊ6g4§f˜\r„D*4üãw¤Œ2ãû¾äW½ğ \"¥ 1„hÈ\n‹½)Í.Ñ4ÔC#Ùñˆ<JQhã×¨¾²Ù­³¼»Ğ	à* èÀ4‘º \"¶‹ °€¤¨!v	ûå`>n³Ji€'‰tÛyh‡©)23ÂM£©ŞHà\$¼úPIìíÕº4k¨ 6ˆ´>cb\0Ø8ë9Lë”VLp`%ÚŸá^@¯†8zÎd³€ÖI¸°\0¬]ú¼±İ©CluxË‘\0@-îEÀà\0€@ú@'–Ø'f¢VK’7j€btçĞŸ™ßE\0V\nà6€V*Š\0;%ìZ'JŒõ*Ç¿\0‚Iğ†¸\"â?ÀãOø;²=Ñ€€â‰‚„¾ª€ƒA¯^¦BÀ{Scˆ¿Š€ÊA ÀˆªğH\n³ĞÅ„4«ŞœG '\0ÈI™¢)önQİ€²yxK±¼²ƒ \0)ÈšJ9e€½dÍbÀ\"Ãüj³É¨ŠÈ@1 ºêHˆÜ\0˜fIq+K¯CÉ0`%-2€\r\n€˜ÒpÒ—,†¨k·€ˆÄú!©§€ày¼†D0½VA»nK(GÊÀjçŠ„M jå+BÍC)`'ôIË4\0º„}¨ª°€pBjSM\$\0âIèì.3&†ì† '}Y@î¡\"ü,¼.8\0à(hn€æzú&€8‘gg†€ÜÜ”dˆ«P\n‹ã€²sÀk3Á2Òƒ;E#›ãéÉ\0âT¨GdEğÁ%…-€ì¯*€=A:\nMµÆTÙ¢¥LÖõj¤9€<¦\n &¢ü­(‹¸€^‡mé,&P€«¬8¨]„jæ\0b?[©0™>Vpû[º:ôáÜç€V^c×@¿Ü¥Ã4Â”4)+à#L]ÉÀ0¦Ğt@Ç\0ç!èù©VSA4¥8»z	Ë×À¬6°ávÀ‘>ƒ¸÷(ƒxÆHD”’&ÿ#³D…t²Í	&Éô‚\"x¤Ëª\"È[ƒe4hmcåGÏ€p»Ä\0Œq™dG‚#ñTÂ 0}rRH\n€'&hz¶`!™¾«¾RÈŞCYhë”Ts'ı˜¤`âds<†ZQç¨¦¡lG	ÕE% V\rZß„üœä¯@((0@C Ì¨”­)	ƒÀ4X	­3;î«±ˆÊÊğÀ‰{xc´Á¤8E¦F ß¬%\0Äv¡ºòÎ-¢ù£Ä¡,¨Üƒ{³ ƒLR8î¤”&x@(€²ªàDÏÖ»âsª«ƒ¾±fYò@)€d;sgÉŸ\0NÄJ¥ª0#ˆ_l!1LĞŞ£ê.Éì¢>ÙñË`;²b™?aı«ºµPN†¹iJ#€¨TâÌ\$d=á	D±OƒüJBZRœÏUÀ É2à<ªÊ‘š '¹˜Ü„çä§‰ûD¡¶˜Öqm\0hX);É&ˆªo#ø(a¤d€\$rê:¬–@¸áñ½±T@™Ø‘/€Ëg!ÌÀc±<*)I/Ê`0 x à3L~a´’İ£”Vš(+¶\0‚È¨\r'ÔûÒxĞØ˜¤ÔH 7°ÊÎ*/ÊyÀ\n¼¦ñ9B]-8z;à2\n?3’Àª»¸¥\$5H|¦ùÃI‘mšÊ€D`,‚Ê²ˆÙ»0ÙK€çLDD¶Ê„0Š˜\0õ0‚)¨i\0®cc{ æ´#à“Äš¸	åÉ˜ÄªÀ	F˜yí¤,„äkß®ºÄÇà €¬‚£GîMÚinNØ`{b 	Et†)G,/‚~„ \0°` ßà°š²	JŠÜM\r‰«QÀpe—<3LÀîª&zÉÓå°ª¼yxØ…Z¯ÌzQ´äm=zÑ\0ï€»)I)ù0HùGDªx\0ñ4Ã(ã‘±\n*í„p7R HGÙ‚œ\0fn¦·#¾BQâ“’\0†a²@=äà\$W.İÆ\\Jâ»K.+òy¼í±yÊ¿l› Â¢\rª”e9\$¥ld€^¥º ÄZ 	ŠªÌ¡ú”R7Æ‚ÀJ£-\"ĞKbfiIÌÓP 8•0ÂÀòÉâæ­¸ 1Ÿ<£G‹:Šƒãê@¾B:Êˆ\n|*ˆ #-¢Iàú Á7¤ÂÂ^¥%ö€)MÍ„’r|Q×à;1ªí*ÉÓÔ€š+\"ÓÖ¤–¦¼‹tL~Â \n@¯—0ÈÇe·ëÓe€šÏ‰´C|Éø QÀ;\0Ì”åhKØxB0‹J…Ju€lªj‰;äyb£À¸úK·ÏŞStûˆ«MêÄsÚ-7)~ÌA9d­Àx©=jˆN8€`àU(¬\\è.F~‰!<KÇŞÆµŠE„²µY‘g’9B~Òd«€ª,¢°S<–üM9H öBIÍ\"²ÈğRy€šÛQ¡,Å X´¯@< V]œƒR(¤>º~c*’hßRO\\°. 7¶0 |ã‘ıÆ† uk:&–ê™âå1½nKÀñ©’-—øùñ’fê™¤TĞÖú /ª’~ÛÓ‡³Ån¶ˆ\nÏHÄª„‰ó 5’†¡Ë¬â\0äzC>\$ÎØÓ™ìô1 h¨ã%îC:ğÃıšÊ¤2½\"øS ,fJ¸ıà\$+´LR`!\0ª„ƒå•ìÕ(ë\n+1v,Õo^¶‚ÉJ…\"¹íÀ,b*Ó1\nAÂj¾p*ÛÈ´Ã3*x&ìB:°ÊQ€fCò\$•ªC\r»¤`<D½°EXıªÆ.ùRƒ(el;[”ëF¢ä{³Â)\$j¬3.E”±b’JÏÍ€±+ù¨-Á¯LE’†C‹4#º!FÑ94|In¨JÌ¨B¥¥p\0ĞÀIÍ/\0¬yë\$¤HØ2! ;Ÿ¦	€9®¸“¤2¸£ª|	¬À3§ûF*öêÈ+B2²”+I\nÂ²È¬Iğ.Xx zôÊîpğ˜\nªˆ£\0>‰OE¥-ÔË¬€3œä“Ïáõ/L±	LÁ ¾LQmM€^`‡ \n«\n‘6hœ“CÙ\09|öm+ˆ\rˆ1«hÈ	Š€òÆ2%&j›y\nçEŸ^¯ïÁ§¿8ğ3·b-9¬q+Œ·íáLçš¼¤CHê’ĞZ\"ÃÇ9öSÓ– ,Dl@ó÷â®°	#Á*<Œ{„ˆ“;#¤ª•¥,Ñ\r¤V£C¥\0\$Llhê°Á\n´±ls”ÄW:ÏÑ.˜|.Hä#4…q^mà\0Ø@X(©Y€²ë²	ãì(\"§Ï6°PUÌ®-Á@ğ’%€#Q*]7‡t€æ…°„9€bTbì!‹.A(w:CÈ\nÃz\0ä£CbÀš¼: ;:MAÎJè.j©)ÜG4±	‰½pNy“Î#ZE1ûLĞ7D¹¨úÀ«™=`\n>Æ<=ã©É-ÌÎéH3:î|{ƒÊx¼‹B²ƒê¹İ6m›&Y4€›TSÀî—€ÎXq„?H ›Ù«GT)àŠ(ıév„Ëñ‘N•“Ê‹¦¶#V¢ı€‡'üu¨è*R\"h\0: °1šÈÈ KùhœŞk+ÑZsDõ€`§2…šb¹`\r¸à1*Ã—g'ùl¬n¤h{ú2†”7€›äYçù\rè™3€2Àdyş…³ğàEŒÛ€q6òøhŒRÜ¨-2\0êìDr»0GÄ¦Cô€âÌ›JÉ¦\$8†Ù!çšÑL‰büèÔÒ°¶‚+çÇ˜?Z3JBÀ!=k9ãÜŸC\0&šûÒî,2°vMÑºè•ÚªZo1ÁŞŞ\0\n	ş……øïÎ\0ÿ0	à‰aYRK€Ã!“ó£¬¬Š·ş¦HÂÿè¢ÔXyƒëÜ0!©¢¨š;I¥Ç Ñ…(åO(éXÇY€®škº§P©§<âÁÃ¬è‹Ğ³g51u\\•qÕÍkR¥Ô<Ş×˜îåø?X‰£GE5Lˆ£\rU\0ÎÕdcU€È5˜`ò\0äì‚Qm_CYŠ^ˆÃ!T…V* ÒÀñÔ5ZQé<µ^” ŸwN4`›A`\0wWõ`ët}b	ƒ¥ 	ÕbaX”dÁ\r„“Z\"›‚H’˜. »ˆô\nÀ×áË”¨e¡n…T€¨â£…,”p'¨ÁŞ Öb`\rj5\0Ø ˆØ0N —†oYÈ`Bg„YÂJo>…ê¥:å 6Š4@Ÿ5‹ƒì4mcU¡d5 ]ƒK‚´!Yòƒb†îHr¦àuib‹ƒî*×)A\rl3°Ia)%^’šK„f¨: ßƒ¨5ŠS‚È‹¬°-w%\$˜³Bû„ˆí¸Hâ²Œ,:àğ©YšMÀ”Ö pÅ€¬rø»ÀÊÄ  îÂ. †á;°(³\0´WJ\nxW•ÔÂJuÊ„”	O¤“(Z©4‹\rmjš¨Ä#‚ü(¡\0%€4åh£O\rk]¨®€ª	@\rÈ¡ Ü Ü(èÕõÎÖÇZ09 Œ<-lCN‰‚/…w©E…hGaŠ€\$(¢¡æ²%`‰\0“ˆ'€2€²‚®P\0û‰\rP\r‰+„€”%o#”PÌáğœ¼“ ”µşV%6ŠƒÀ!V×ú)à£¢ŸVf˜Ac;à&ÅCA”Ä4)1ƒş1½cõıØf ”X/Y­m6†v•E€&Ø	`İ€Õş€GZ°@R‚‹EaÖŒoamná(Øm†¢P)O¢Ø|/ˆXøÂ E‰Bç\rB/€Àåb-h,Ø\$øÕ :Øx	M‰b…,\0£Wp	ı œÔ@l€é0èlÂÚ\0tÀÈm@€öuˆõìXª¨Õv0×²4Ø+‚(¸öÖ`%fCTXEYØ†v.Ö…^]¡P†HêLÃK¥JMAVªíkØÿY‰Ö	Øú“í„–+YJ”]‘–l/’XmaÅ”5­\0÷eM\0>€ûcCVÕÜJÁaU’C0Ù%pcµÕW»aHÒa\$×3`ÀÕvZXue°Õ!q‰Ô\0¯µ°	ì@œvi†‹ZåbÕú	øÅ—@");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…†81ĞÊx:\nOg#)Ğêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO G#ÒX·VCÆs¡ Z1.Ğhp8,³[¦Häµ~Cz§Éå2¹l¾c3šÍés£‘ÙI†bâ4\néF8Tà†I˜İ©U*fz¹är0EÆÀØy¸ñfY.:æƒIŒÊ(Øc·áÎ‹!_l™í^·^(¶šN{S–“)rËqÁY“–lÙ¦3Š3Ú\n˜+G¥Óêyºí†Ëi¶ÂîxV3w³uhã^rØÀº´aÛ”ú¹cØè\r“¨ë(.ÂˆºChÒ<\r)èÑ£¡`æ7£íò43'm5Œ£È\nPÜ:2£P»ª‹q òÿÅC“}Ä«ˆúÊÁê38‹BØ0hR‰Èr(œ0¥¡b\\0ŒHr44ŒÁB!¡pÇ\$rZZË2Ü‰.Éƒ(\\5Ã|\nC(Î\"€P…ğø.ĞNÌRTÊÎ“Àæ>HN…8HPá\\¬7Jp~„Üû2%¡ĞOC¨1ã.ƒ§C8Î‡HÈò*ˆj°…á÷S(¹/¡ì¬6KUœÊ‡¡<2‰pOI„ôÕ`Ôäâ³ˆdOH Ş5-üÆ4ŒãpX25-Ò¢òÛˆ°z7£¸\"(°P \\32:]UÚèíâß…!]¸<·AÛÛ¤’ĞßiÚ°‹l\rÔ\0v²Î#J8«ÏwmíÉ¤¨<ŠÉ æü%m;p#ã`XDŒø÷iZøN0Œ•È9ø¨å Áè`…wJD¿¾2Ò9tŒ¢*øÎyìËNiIh\\9ÆÕèĞ:ƒ€æáxï­µyl*šÈˆÎæY Ü‡øê8’W³â?µŞ›3ÙğÊ!\"6å›n[¬Ê\r­*\$¶Æ§¾nzxÆ9\rì|*3×£pŞï»¶:(p\\;ÔËmz¢ü§9óĞÑÂŒü8N…Áj2½«Î\rÉHîH&Œ²(Ãz„Á7iÛk£ ‹Š¤‚c¤‹eòı§tœÌÌ2:SHóÈ Ã/)–xŞ@éåt‰ri9¥½õëœ8ÏÀËïyÒ·½°VÄ+^WÚ¦­¬kZæY—l·Ê£Œ4ÖÈÆ‹ª¶À¬‚ğ\\EÈ{î7\0¹p†€•D€„i”-TæşÚû0l°%=Á ĞËƒ9(„5ğ\n\n€n,4‡\0èa}Üƒ.°öRsï‚ª\02B\\Ûb1ŸS±\0003,ÔXPHJspåd“Kƒ CA!°2*WŸÔñÚ2\$ä+Âf^\n„1Œ´òzEƒ Iv¤\\äœ2É .*A°™”E(d±á°ÃbêÂÜ„Æ9‡‚â€ÁDh&­ª?ÄH°sQ˜2’x~nÃJ‹T2ù&ãàeRœ½™GÒQTwêİ‘»õPˆâã\\ )6¦ôâœÂòsh\\3¨\0R	À'\r+*;RğHà.“!Ñ[Í'~­%t< çpÜK#Â‘æ!ñlßÌğLeŒ³œÙ,ÄÀ®&á\$	Á½`”–CXš‰Ó†0Ö­å¼û³Ä:Méh	çÚœGäÑ!&3 D<!è23„Ã?h¤J©e Úğhá\r¡m•˜ğNi¸£´’†ÊNØHl7¡®v‚êWIå.´Á-Ó5Ö§ey\rEJ\ni*¼\$@ÚRU0,\$U¿E†¦ÔÔÂªu)@(tÎSJkáp!€~­‚àd`Ì>¯•\nÃ;#\rp9†jÉ¹Ü]&Nc(r€ˆ•TQUª½S·Ú\08n`«—y•b¤ÅLÜO5‚î,¤ò‘>‚†xââ±fä´’âØ+–\"ÑI€{kMÈ[\r%Æ[	¤eôaÔ1! èÿí³Ô®©F@«b)RŸ£72ˆî0¡\nW¨™±L²ÜœÒ®tdÕ+íÜ0wglø0n@òêÉ¢ÕiíM«ƒ\nA§M5nì\$E³×±NÛál©İŸ×ì%ª1 AÜûºú÷İkñrîiFB÷Ïùol,muNx-Í_ Ö¤C( fél\r1p[9x(i´BÒ–²ÛzQlüº8CÔ	´©XU Tb£İIİ`•p+V\0î‹Ñ;‹CbÎÀXñ+Ï’sïü]H÷Ò[ák‹x¬G*ô†]·awnú!Å6‚òâÛĞmSí¾“IŞÍKË~/Ó¥7ŞùeeNÉòªS«/;dåA†>}l~Ïê ¨%^´fçØ¢pÚœDEîÃa·‚t\nx=ÃkĞ„*dºêğT—ºüûj2ŸÉjœ\n‘ É ,˜e=‘†M84ôûÔa•j@îTÃsÔänf©İ\nî6ª\rdœ¼0ŞíôYŠ'%Ô“íŞ~	Ò¨†<ÖË–Aî‹–H¿G‚8ñ¿Îƒ\$z«ğ{¶»²u2*†àa–À>»(wŒK.bP‚{…ƒoı”Â´«zµ#ë2ö8=É8>ª¤³A,°e°À…+ìCè§xõ*ÃáÒ-b=m‡™Ÿ,‹a’Ãlzkï\$Wõ,mJiæÊ§á÷+‹èı0°[¯ÿ.RÊsKùÇäXçİZLËç2`Ì(ïCàvZ¡ÜİÀ¶è\$×¹,åD?H±ÖNxXôó)’îM¨‰\$ó,Í*\nÑ£\$<qÿÅŸh!¿¹S“âƒÀŸxsA!˜:´K¥Á}Á²“ù¬£œRşšA2k·Xp\n<÷ş¦ıëlì§Ù3¯ø¦È•VV¬}£g&Yİ!†+ó;<¸YÇóŸYE3r³Ùñ›Cío5¦Åù¢Õ³Ïkkş…ø°ÖÛ£«Ït÷’Uø…­)û[ıßÁî}ïØu´«lç¢:DŸø+Ï _oãäh140ÖáÊ0ø¯bäK˜ã¬’ öşé»lGª„#ªš©ê†¦©ì|Udæ¶IK«êÂ7à^ìà¸@º®O\0HÅğHiŠ6\r‡Û©Ü\\cg\0öãë2BÄ*eà\n€š	…zr!nWz& {H–ğ'\$X  w@Ò8ëDGr*ëÄİHå'p#Ä®€¦Ô\ndü€÷,ô¥—,ü;g~¯\0Ğ#€Ì²EÂ\rÖI`œî'ƒğ%EÒ. ]`ÊĞ›…î%&Ğîm°ı\râŞ%4S„vğ#\n fH\$%ë-Â#­ÆÑqBâíæ ÀÂQ-ôc2Š§‚&ÂÀÌ]à™ èqh\rñl]à®s ĞÑhä7±n#±‚‚Ú-àjE¯Frç¤l&dÀØÙåzìF6¸ˆÁ\" “|¿§¢s@ß±®åz)0rpÚ\0‚X\0¤Ùè|DL<!°ôo„*‡D¶{.B<Eª‹‹0nB(ï |\r\nì^©à h³!‚Öêr\$§’(^ª~èŞÂ/pq²ÌB¨ÅOšˆğú,\\µ¨#RRÎ%ëäÍdĞHjÄ`Â ô®Ì­ Vå bS’d§iE‚øïoh´r<i/k\$-Ÿ\$o”¼+ÆÅ‹ÎúlÒŞO³&evÆ’¼iÒjMPA'u'Î’( M(h/+«òWD¾So·.n·.ğn¸ìê(œ(\"­À§hö&p†¨/Ë/1DÌŠçjå¨¸EèŞ&â¦€,'l\$/.,Äd¨…‚W€bbO3óB³sH :J`!“.€ª‚‡Àû¥ ,FÀÑ7(‡ÈÔ¿³û1Šlås ÖÒ‘²—Å¢q¢X\rÀš®ƒ~Ré°±`®Òó®Y*ä:R¨ùrJ´·%LÏ+n¸\"ˆø\r¦ÎÍ‡H!qb¾2âLi±%ÓŞÎ¨Wj#9ÓÔObE.I:…6Á7\0Ë6+¤%°.È…Ş³a7E8VSå?(DG¨Ó³Bë%;ò¬ùÔ/<’´ú¥À\r ì´>ûMÀ°@¶¾€H DsĞ°Z[tH£Enx(ğŒ©R xñû@¯şGkjW”>ÌÂÚ#T/8®c8éQ0Ëè_ÔIIGII’!¥ğŠYEdËE´^tdéthÂ`DV!Cæ8¥\r­´Ÿb“3©!3â@Ù33N}âZBó3	Ï3ä30ÚÜM(ê>‚Ê}ä\\Ñtê‚f fŒËâI\r®€ó337 XÔ\"tdÎ,\nbtNO`Pâ;­Ü•Ò­ÀÔ¯\$\n‚ßäZÑ­5U5WUµ^hoıàætÙPM/5K4Ej³KQ&53GX“Xx)Ò<5D…\rûVô\nßr¢5bÜ€\\J\">§è1S\r[-¦ÊDuÀ\rÒâ§Ã)00óYõÈË¢·k{\nµÄ#µŞ\r³^·‹|èuÜ»Uå_nïU4ÉUŠ~YtÓ\rIšÃ@ä³™R ó3:ÒuePMSè0TµwW¯XÈòòD¨ò¤KOUÜà•‡;Uõ\n OYéYÍQ,M[\0÷_ªDšÍÈW ¾J*ì\rg(]à¨\r\"ZC‰©6uê+µYóˆY6Ã´0ªqõ(Ùó8}ó3AX3T h9j¶jàfõMtåPJbqMP5>ğÈø¶©Y‡k%&\\‚1d¢ØE4À µYnÊí\$<¥U]Ó‰1‰mbÖ¶^Òõš ê\"NVéßp¶ëpõ±eMÚŞ×WéÜ¢î\\ä)\n Ë\nf7\n×2´õr8‹—=Ek7tVš‡µ7P¦¶LÉía6òòv@'‚6iàïj&>±â;­ã`Òÿa	\0pÚ¨(µJÑë)«\\¿ªnûòÄ¬m\0¼¨2€ôeqJö­PôtŒë±fjüÂ\"[\0¨·†¢X,<\\Œî¶×â÷æ·+md†å~âàš…Ñs%o°´mn×),×„æÔ‡²\r4¶Â8\r±Î¸×mE‚H]‚¦˜üÖHW­M0Dïß€—å~Ë˜K˜îE}ø¸´à|fØ^“Ü×\r>Ô-z]2s‚xD˜d[s‡tS¢¶\0Qf-K`­¢‚tàØ„wT¯9€æZ€à	ø\nB£9 Nb–ã<ÚBşI5o×oJñpÀÏJNdåË\rhŞÃ2\"àxæHCàİ–:øı9Yn16Æôzr+z±ùş\\’÷•œôm Ş±T öò ÷@Y2lQ<2O+¥%“Í.Óƒhù0AŞñ¸ŠÃZ‹2R¦À1£Š/¯hH\r¨X…ÈaNB&§ ÄM@Ö[xŒ‡Ê®¥ê–â8&LÚVÍœvà±*šj¤ÛšGHåÈ\\Ù®	™²¶&sÛ\0Qš \\\"èb °	àÄ\rBs›Éw‚	ÙáBN`š7§Co(ÙÃà¨\nÃ¨“¨1š9Ì*E˜ ñS…ÓU0Uº tš'|”m™°Ş?h[¢\$.#É5	 å	p„àyBà@Rô]£…ê@|„§{™ÀÊP\0xô/¦ w¢%¤EsBd¿§šCUš~O×·àPà@Xâ]Ô…¨Z3¨¥1¦¥{©eLY‰¡ŒÚ¢\\’(*R` 	à¦\n…ŠàºÌQCFÈ*¹¹àéœ¬Úp†X|`N¨‚¾\$€[†‰’@ÍU¢àğ¦¶àZ¥`Zd\"\\\"…‚¢£)«‡Iˆ:ètšìoDæ\0[²¨à±‚-©“ gí³‰™®*`hu%£,€”¬ãIµ7Ä«²Hóµm¤6Ş}®ºNÖÍ³\$»MµUYf&1ùÀ›e]pz¥§ÚI¤Åm¶G/£ ºw Ü!•\\#5¥4I¥d¹EÂhq€å¦÷Ñ¬kçx|Úk¥qDšb…z?§º‰>úƒ¾:†“[èLÒÆ¬Z°Xš®:¹„·ÚÇjßw5	¶Y¾0 ©Â“­¯\$\0C¢†dSg¸ë‚ {@”\n`	ÀÃüC ¢·»Mºµâ»²# t}xÎN„÷º‡{ºÛ°)êûCƒÊFKZŞj™Â\0PFY”BäpFk–›0<Ú>ÊD<JE™šg\rõ.“2–ü8éU@*Î5fkªÌJDìÈÉ4•TDU76É/´è¯@·‚K+„ÃöJ®ºÃÂí@Ó=ŒÜWIOD³85MšNº\$Rô\0ø5¨\ràù_ğªœìEœñÏI«Ï³Nçl£Òåy\\ô‘ˆÇqU€ĞQû ª\n@’¨€ÛºÃpš¬¨PÛ±«7Ô½N\rıR{*qmİ\$\0R”×Ô“ŠÅåqĞÃˆ+U@ŞB¤çOf*†CË¬ºMCä`_ èüò½ËµNêæTâ5Ù¦C×»© ¸à\\WÃe&_XŒ_Øhå—ÂÆBœ3ÀŒÛ%ÜFW£û|™GŞ›'Å[¯Å‚À°ÙÕV Ğ#^\rç¦GR€¾˜€P±İFg¢ûî¯ÀYi û¥Çz\nâ¨Ş+ß^/“¨€‚¼¥½\\•6èßb¼dmh×â@qíÕAhÖ),J­×W–Çcm÷em]ÓeÏkZb0ßåşYñ]ymŠè‡fØe¹B;¹ÓêOÉÀwŸapDWûŒÉÜÓ{›\0˜À-2/bN¬sÖ½Ş¾Ra“Ï®h&qt\n\"ÕiöRmühzÏeø†àÜFS7µĞPPòä–¤âÜ:B§ˆâÕsm¶­Y düŞò7}3?*‚túòéÏlTÚ}˜~€„€ä=cı¬ÖŞÇ	Ú3…;T²LŞ5*	ñ~#µA•¾ƒ‘sx-7÷f5`Ø#\"NÓb÷¯G˜Ÿ‹õ@Üeü[ïø¤Ìs‘˜€¸-§˜M6§£qqš h€e5…\0Ò¢À±ú*àbøISÜÉÜFÎ®9}ıpÓ-øı`{ı±É–kP˜0T<„©Z9ä0<Õš\r­€;!Ãˆgº\r\nKÔ\n•‡\0Á°*½\nb7(À_¸@,îe2\rÀ]–K…+\0Éÿp C\\Ñ¢,0¬^îMĞ§šº©“@Š;X\r•ğ?\$\r‡j’+ö/´¬BöæP ½‰ù¨J{\"aÍ6˜ä‰œ¹|å£\n\0»à\\5“Ğ	156ÿ† .İ[ÂUØ¯\0dè²8Yç:!Ñ²‘=ºÀX.²uCªŠŒö!Sº¸‡o…pÓBİüÛ7¸­Å¯¡Rh­\\h‹E=úy:< :u³ó2µ80“si¦ŸTsBÛ@\$ Íé@Çu	ÈQº¦.ô‚T0M\\/ê€d+Æƒ\n‘¡=Ô°dŒÅëA¢¸¢)\r@@Âh3€–Ù8.eZa|.â7YkĞcÀ˜ñ–'D#‡¨Yò@Xq–=M¡ï44šB AM¤¯dU\"‹Hw4î(>‚¬8¨²ÃC¸?e_`ĞÅX:ÄA9Ã¸™ôp«GĞä‡Gy6½ÃF“Xr‰¡l÷1¡½Ø»B¢Ã…9Rz©õhB„{€™\0ëå^‚Ã-â0©%Dœ5F\"\"àÚÜÊÂ™úiÄ`ËÙnAf¨ \"tDZ\"_àV\$Ÿª!/…D€áš†ğ¿µ‹´ˆÙ¦¡Ì€F,25Éj›Tëá—y\0…N¼x\rçYl¦#‘ÆEq\nÍÈB2œ\nìà6·…Ä4Ó×”!/Â\nóƒ‰Q¸½*®;)bR¸Z0\0ÄCDoŒË48À•´µ‡Ğe‘\nã¦S%\\úPIk‡(0ÁŒu/™‹G²Æ¹ŠŒ¼\\Ë} 4Fp‘Gû_÷G?)gÈotº[vÖ\0°¸?bÀ;ªË`(•ÛŒà¶NS)\nãx=èĞ+@êÜ7ƒjú0—,ğ1Ã…z™“­>0ˆ‰GcğãL…VXôƒ±ÛğÊ%À…Á„Q+øéoÆFõÈéÜ¶Ğ>Q-ãc‘ÚÇl‰¡³¤wàÌz5G‘ê‚@(h‘cÓHõÇr?ˆšNbş@É¨öÇø°îlx3‹U`„rwª©ÔUÃÔôtØ8Ô=Àl#òõlÿä¨‰8¥E\"Œƒ˜™O6\n˜Â1e£`\\hKf—V/Ğ·PaYKçOÌı éàx‘	‰Oj„óÅÄ¨€pÌM„…L‹°\r%ºè\"B	³H1\$o	Ø‘hI&”\ræ!)””!° 2\0‰FË Òè‹Ñä,|GÊ±ÀE1OúLM|“ä£&‡D<`2Z	´—\$èê1I„'Rd!¬ŸäÒòHø¹.OrN“,£®X&\nÖ°¹€”b<\$É¬ê6´ÈzšÃø1ğ¼ªî%HÖC`x²¬\rü¦EÙ(\"<@n¨äë°<É¨r¯éµåOÆ\r†8\r’´]Âs¹'=†ÔSè+°ª>Ñ,Ë<{Ãà`M\nk- ÜKrNaù–šE%¬Gy4&'(G\$ …È	-9é’å–¬µâŞdøê–g‹>*ĞÄÚõÛKä2yHv™*YQ ØË0*’@6PóÙ*€ìoÀ@’P/ôhÉO˜˜DŒš\")ƒÌm”‘TÏ’	cNd‘Œe^¼ÀQ£\0öeiğ™8ˆœx\"‰•¶àÍƒt Œ”õ2·#® dè×\$ÆËñ4™LÀ\r“A\"\\\\cıˆÕ\nŞdÄ÷`‚‚ËÉ&Íb!åZ2gÕª	±8€ªî4\\?Ø j6#\0µ‰©(Ty„ƒ‡¦\0mi+Â»“‚<°²¤àÒ#}òªa–ÁPMå%a×Dã”åZñè&Ò4‹HŠ> ‘ %0*ŒZc(@Ü]óÎQ:*¬—ê('\"xÍ'J_ÓŸ1¹º`>7	#Ù\"O4PXü±”|B4»é‰[Ê˜éÙØ\$nïˆ1`ôêGSAõÖËAH» \$ğ…`<<jcUlò@Ù<°87E¤CÁjÿEy:×@îu«rìíâ›<éè~~|öÂ·ÁÇ£HsEÂ²aáÇ>e¹Îİøx ÀQfô'à¸rw&¶ÌëXà†½Îİ•¢ÁuiâjDî'ÍûA¹H(“àÉ}?Èëghöˆ—0QN˜”3o4Ô§T†7!}3¶\\˜Ü¶Nç›„uTè«7«ÓTôª+kk<¢\0ø§ÇáĞÙóËdüñI9!™ù¤‚³³ŒÿØå>€µÎâ€±\rç†MXwDş * z€R‘yîQ!²@Ÿ`Ç®qÉr‹Ì@<½Â;\0000˜\"!œx¾¸hÌ (\nTª‘WÂIær&Dv\rÒèœ5Ó#\$§3(\0P@");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Gc=file_open_lock(get_temp_dir()."/adminer.version");if($Gc)file_write_unlock($Gc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$m,$Mb,$Rb,$Zb,$n,$Ic,$Mc,$aa,$kd,$x,$ba,$zd,$le,$Le,$Vf,$Qc,$ug,$yg,$U,$Lg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Ee=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Ee[]=true;call_user_func_array('session_set_cookie_params',$Ee);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$tc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$zd=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bg'=>'Ğ‘ÑŠĞ»Ğ³Ğ°Ñ€ÑĞºĞ¸','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','bs'=>'Bosanski','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'Î•Î»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fi'=>'Suomi','fr'=>'FranÃ§ais','gl'=>'Galego','he'=>'×¢×‘×¨×™×ª','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èª','ka'=>'áƒ¥áƒáƒ áƒ—áƒ£áƒšáƒ˜','ko'=>'í•œêµ­ì–´','lv'=>'LatvieÅ¡u','lt'=>'LietuviÅ³','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ğ ÑƒÑÑĞºĞ¸Ğ¹','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ğ¡Ñ€Ğ¿ÑĞºĞ¸','sv'=>'Svenska','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ğ£ĞºÑ€Ğ°Ñ—Ğ½ÑÑŒĞºĞ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ba;return$ba;}function
lang($u,$ge=null){if(is_string($u)){$Oe=array_search($u,get_translations("en"));if($Oe!==false)$u=$Oe;}global$ba,$yg;$xg=($yg[$u]?$yg[$u]:$u);if(is_array($xg)){$Oe=($ge==1?0:($ba=='cs'||$ba=='sk'?($ge&&$ge<5?1:2):($ba=='fr'?(!$ge?0:1):($ba=='pl'?($ge%10>1&&$ge%10<5&&$ge/10%10!=1?1:2):($ba=='sl'?($ge%100==1?0:($ge%100==2?1:($ge%100==3||$ge%100==4?2:3))):($ba=='lt'?($ge%10==1&&$ge%100!=11?0:($ge%10>1&&$ge/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($ge%10==1&&$ge%100!=11?0:($ge%10>1&&$ge%10<5&&$ge/10%10!=1?1:2)):1)))))));$xg=$xg[$Oe];}$xa=func_get_args();array_shift($xa);$Ec=str_replace("%d","%s",$xg);if($Ec!=$xg)$xa[0]=format_number($ge);return
vsprintf($Ec,$xa);}function
switch_lang(){global$ba,$zd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$zd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($zd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($zd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$ra=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Od,PREG_SET_ORDER);foreach($Od
as$A)$ra[$A[1]]=(isset($A[3])?$A[3]:1);arsort($ra);foreach($ra
as$y=>$Ye){if(isset($zd[$y])){$ba=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($ra[$y])&&isset($zd[$y])){$ba=$y;break;}}}$yg=$_SESSION["translations"];if($_SESSION["translations_version"]!=1114216008){$yg=array();$_SESSION["translations_version"]=1114216008;}function
get_translations($yd){switch($yd){case"en":$g="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Şa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Şr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ĞY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚0Ê\nÒãdFé	ŒŞn:ZÎ°)­ãQ¦ÕÈmwÛø€İO¼êmfpQËÎ‚‰†qœêaÊÄ¯±#q®–w7SX3” ‰œŠ˜o¢\n>Z—M„ziÃÄs;ÙÌ’‚„_Å:øõğ#|@è46ƒÃ:¾\r-z| (j*œ¨Œ0¦:-hæé/Ì¸ò8)+r^1/Ğ›¾Î·,ºZÓˆKXÂ9,¢pÊ:>#Öã(Ş6ÅqBô7ÃØ4µ¨È2¶LtÃ.ËÂÏ\nH¤h\n|Z29CzÔ7I‹ğÚæH\nj=)­Ã(î/\nŒCË:„³\$Í0Ê–ˆZs˜jÔ±8Æ4N`ò;ÀPö9Ikl Œm‹_<\"ôH\"…²ºLÌÚÔ£Ô2ÑÂè¸Ïq£a	Šr¡4©ÔˆÂ“1OAH<²M	ËU\$ÉóÕVÊúØ%¸\$	Ğš&‡B˜¦cÍœ<‹´ˆÚŒ’…KF©¬Úââ§­~Ÿ,êr(‹ J\0ApÜÎ€9À«âP&'°h6B;¿ƒ0Í·í\"üÆRˆÎ‚¯\" ŞJãpò¯ƒ¨Æ1©#˜Ì:¶İ…Œ¼P‘õ[²µ§éÚÙ3µ¦\r„OØb‡â8+‹¯˜Ì!…ºôÀìÕÜ:³¬0™)`ˆ>ˆx–)h·l8\r1ö2Ï/acÉBT¨Â¯v‹'ézjjâF4 #0z\røà9‡Ax^;îrA/ÁrÎ3…òó]wh^(ğ’±\"õèã}o„£ş7¤,Ä®5§l­,XÆ’×èOSÙÆ¿*l9q4O˜*@	¥é6+ÑÃÌ³Æ‰Â33£–…–h¹v-)dkşËõ#˜Ã},ÈCcÀİP%··÷;ıâ£Zşš„€(ApÙB€¤H\nE¤ÍP!µíÿVæ²èÓ\"4²h»*ûPlÀRŠa1&m}Ó¨xO‰s=ÌA›¼Bxƒƒ<2	8ù\0SÛ--¥W™âÃ	ù4hİ£²BÂ˜RÏÕÊæÀ©Md\$Ñª¶¬JÉi/7Èm\nŸØaá%8áŸö MZûİ>ÇŒµ¼¦¢¹L0I\"ƒrByÕ”1?æ€€‡fTI\"–27GtÕˆc#Ç-“ãÜeIC'Uå¥î„ğ¦!àlHš°è=KŠçwQ4€Ÿxd¹pn\$§89Æ”]È«1¤ Äh@vHá\$Š9†p@ÂˆL\$ˆ(É’0ŒÌ7E‰Ï—ˆÂŒÕr` \$™Ò`bÉò½<‡ÀIjXUl¹ªÄ-©}-—4¸ƒªÄİ—ã:é•Ba–êº];pÌ§&z´š2Ù]‰ª¾¦Äh@6¸ÕZç;\$›7êã\\€iÌ,¼ ’pK££dT*`Z®.ç4”*ƒ—æTº%¯õ¯«Sa&ê¼˜l~V=·LDÖñ˜/«bÈJgŒóHü9±XpÀT|\r’9î^B©ã6©hµÎ—%HX\\m¶³ù6K9F<	DR„štiYQA\\4òp@HBôLt<;Ğê©%â‰& (!‘ã~£ÃÃı/TTà§åVÑ#dx¹ºsEJh…S‹Åù…”õ8ÏàO	sh×2Ğe«°c¯†½à";break;case"ar":$g="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0Se\\¶\r…ŒbÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬†Aòéj_1CĞM…«e€¢S™\ng@ŸOgë¨ô’XÙDMë)˜°0Œ†cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}‰ÎÑ*zªU@¦ŠX;ai1l(nóÕòıÃ[Óy™dŞu'c(€ÜoF“±¤Øe3™Nb¦ êp2NšS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.•[¶Q`u	!Š­Jyµˆ&2¶(gTÍÔSÑšMÆxì5g5¸K®K¦Â¦àØ÷á—0Ê€(ª7\rm8î7(ä9\rã’f\"7NÂ9´£ ŞÙ4Ãxè¶ã„xæ;Á#\"¸¿…Š´¥2É°W\"J\nî¦¬Bê'hkÀÅ«b¦Diâ\\@ªêÊp¬•êyf ­’9ÊÚV¨?‘TXW¡‰¡FÃÇ{â¹3)\"ªW9Ï|Á¨eRhU±¬Òªû1ÆÁPˆ>¨ê„\"o|Ù7£éÚLQi\\¬ H\"¨¤ª#¨›1ê£ÄÅ‹ï#ÅòƒÜ‡Jrª >³J­ÑÈsŞœ:îšã?P]<­T(\"'?°nœpSJ©SZªÉ»¬‰\"Ã\"T(üÌ<¶@SN¨^v8bšW‰±Vµ#Ï«¢3ÒhÃDËÚ>T&‰´´êµ´Lğ¾ñe´ÈSµx“£å|úÆ'È±@I«²ƒËwº²[IÏl~È!TÙl¨tK•=ë®œ›¨)uÒÛ„¨83¨Q_@	¢ht)Š`PÔ5ãhÚ‹cT0‹©¢CÓìğ OhH\"7î^¥¶pL\n7gM*˜gÚÊ<7cpæ4úRg‚:Å`BCè6Ló@0M(Ş3ÃcÔ2ÑQ[!*j•=A@º‘bO!X]\"ÃSìMD íËåvÆ¯«aZ§»ÈJ\0„Ï©Âå;b®C!iMùx ’ºCwm[´ûUÔ©˜›·c“SD•u£N»àÂĞë£0z\r è8aĞ^ıÈ\\0ŒƒnÇA#8^2Ş‘âizh^)ğ’6\rxÛâà^0‡ÙàAé·£}tÚûcÖÒ0ä6Œ#w¨§¿ió®A²©K÷T±¥Ä]Â¨8J™ŠƒCJCtiˆ;šàØ¥3 —¦®ƒfs¨`1†3dÃ0u€á°7†sÔ )½6ø†¦§z¤0†ÀæQ²9/Å¸ª’Uô‰ÕÃ\r?ˆİ³°R‚š!¤Lı˜2*T5H0à‰°`†Ó_T=AœÚƒTk\rq°ªé\r5cfoĞª…°p;Å·øÿšè Œ¬9¡Ø-!½|¸8T8è 7ÁŒ4=°ÒİŒ71†ê„\ny'!¢È0¦‚4IP„Z*6ÿ‹jCF<¸§Ô’àˆilDÑ!©’æŞDKO'Å\rÊfúVÅ“„:Nª2PÊ)G>G,A9’¡\nÒ3Tdù8¶xLÂI&|@Ò®:B¹ï›ãf×Cˆu6H\\3 €Ú½wğâBˆ8„!`C¦Å§×Ú %„\n<)…BDYœ£/èä¹z¤Uá{—¯¸¢BlNŠ\$Äº#Câsçú»Èª–È›?ŒLG{D¡h¢º*[Sã\n (Ù™!P!·ƒğ:°ÅÁ\0S\n!0h²\rk«ÁP(RÙ©‚Sro´iSr ÄˆŸª3öB ±0¬0ıfÙS•™\$ªjEp‘5ÆMÓíOPÕI—\"×)V­Q“MŠ”ƒ¸	Q\naĞ9ÀVÛc\rm:°ífÔU{ox4†`óPÉ˜F¦á¶C¡x\0U\nƒ†~ì!ë«dèü8)E˜‰=âŞÕ|aÉ…-‹šÚ¢‚`(\n	¶Ã0¶kEs.I€-t°İ”y ^íÜ¹Uõx-Á\0\":©QP‚\"—-ûôõ0C©©zuâ93	¾–Ô„Ph\n»nò)“BŠJTB[”ğÕ8™‚ª_e\"Õ¸iÆ¸9;ipS¦¾\0Å´™gEu¾V—0’\\ÏWÖúÍ­ÆÑÕF`\n­&–Ã	D¯hğ(";break;case"bg":$g="ĞP´\r›EÑ@4°!Awh Z(&‚Ô~\n‹†faÌĞNÅ`Ñ‚şDˆ…4ĞÕü\"Ğ]4\r;Ae2”­a°µ€¢„œ.aÂèúrpº’@×“ˆ|.W.X4òå«FPµ”Ìâ“Ø\$ªhRàsÉÜÊ}@¨Ğ—pÙĞ”æB¢4”sE²Î¢7fŠ&EŠ, Ói•X\nFC1 Ôl7còØMEo)_G×ÒèÎ_<‡GÓ­}†Íœ,kë†ŠqPX”}F³+9¤¬7i†£Zè´šiíQ¡³_a·–—ZŠË*¨n^¹ÉÕS¦Ü9¾ÿ£YŸVÚ¨~³]ĞX\\Ró‰6±õÔ}±jâ}	¬lê4v±ø=ˆè†3	´\0ù@D|ÜÂ¤‰³[€’ª’^]#ğs.Õ3d\0*ÃXÜ7ãp@2CŞ9(‚ Â:#Â9Œ¡\0È7Œ£˜Aˆèê8\\z8Fc˜ïŒ‹ŠŒä—m XúÂÉ4™;¦rÔ'HS†˜¹2Ë6A>éÂ¦”6Ëÿ5	êÜ¸®kJ¾®&êªj½\"Kºüª°Ùß9‰{.äÎ-Ê^ä:‰*U?Š+*>SÁ3z>J&SKêŸ&©›ŞhR‰»’Ö&³:ŠãÉ’>I¬J–ªLãHÑ,«Êã¥/µ\r/¸ÍSYF.°Rc[?ILÎØ6M¢)£äıVÑ5Ô°ĞšRf„ÊeƒrhªñiĞÊW4²¬&+Å’Ø¯«\\´A#\"Õ-(˜İÔUâ­£ïÒ?	„ˆZwøj”Ká\0’+@Á\"M*EV\nCàè¤ÊïbM‹ór¢´šÁ+Ï)º‰YNJbËBXèŠ£Ò6#äò'‚,}“äé¤ÌC2Š ¾§è–R*ZWE*ª¼ Ë²”­x§×êùÁN}ŞÒ[4ü’çú{^a\ní¬hR8th(ÄæÎ€” P¶®³Ûˆº´ÅæèÙÛvŠ½“Êš¾²VõD\"\r#œb6F«pAÄãwÄÇ\\g2 Ê7cHßÌ.(¨¾? PØ:TFŸO2ò7ÊÈW;ƒ;k¼=ÁöË“¼“î6ø‡á)R¥»Löà\$pRM¤Ö¨k’ùâÎ®´ÁvÎ<¯yŠ±¢?}EĞã„L±¤jŞ£h÷Jfw£ø\n÷„¼ø´7‘3ùT5w:Èo¡mz~]ëQÂ`öãÜ{Å‰-v,\\PÑ«BÌ`Ô4rôAŞ1'3t¿ !¥ù*jğ˜ñ`İù^I¢=é“xÎú_@ªx¸ªˆ<a	ä\$ËN<òDœËayAjÌÙ“À\\àa 9PÌAhĞ80tÁxwŠ@¸0†@ÚCr(È¬3‚÷/œ«—s.l‚\"Ü¢\$Gá,À^AóİGF™V?‡œWÑ>å”ù6DõÕ¹{Xç…Ãå’¶97Š•œ•¸øö“Á/>Ê áš£ºCcÉÑ:eN6r²Q hF¡„1‡G4‰ƒ»/\r€€1#PàŠ2+\r¡•wÌåƒ’>a‡0ÌeXl\rá,	R@ ™ÕÃK0@â(drò˜0†ÀæsV“eY(”ÎÇW!K¤¼+uh-‚¥;ÏÌ\0	–›‰•ŞŸà@\np)/0ä¬š¶tÔ\0PCsqfRÅ€Ï2ƒx È4‡f^C<´¡I	8TvÑìÕ˜AŞZJ	EAˆAÍ\"KÊB‰¦]'Õ!¤T—pw\r¤1Ì˜®âT¬F´¤1†êéXVJ\r3äÈOÉr€R¢\$†ÁÑ¢#‰¤?oO,ŞÒDÿP\$k†U,=wV‡MÚ{„eAåƒµ\n)´AE)ó&sHÕÖ¢Vh‰N:•Ä²Ój“Âö©\$²ë		ò{N3ù9½tÖGÄ½xriÔ´º¶Ó‰yå<)‰ú)UÂoJåx*@€ Åh°Š™Ö5\nxªUãÄeä™€:u¸óÀ†}Wõ©kViİ¾xBğ]óXF¼†’¼ù£ª^iGÛ©\nşÒÉ²FÁVupc•±åFÊ—d#Äİ,!‹'ÊÒrU-Ğp'H„Î%*Mga\rxUü°‚\0¦Bag.…¬šan0TL¾²^RÒ”ŠbÍvr&öì‰P.(V\0®¡{\rSÈ¹(=f(¼öğv‚Wì±Æ…ğjf6®(ñµ…²œ\rÛ&0Æ®ÕÏˆXLåÂ3q,Ú\$Vö,j/yF³\\E#±,Äñİ°ã› .\n Ct°—Ó¦LWß\\Ò¯\" “M¡kQæ·ØõTÎçbl¾ffIS}&ÒtT*`Z*lˆLµ)“”F†q…¢ïÃiC\0001CkjñÚîÏ\rhXâfµ[0»S® ¾×7\nus³\rõŒHôÒ¢®qçM,Ş¸‹É©•«µ[M`¿‘ |L!î¿ê<‹†À¢V	ü‚Ìõ¦CS.•R»ıZıšØ,£½ä+ÚxÒ¸\0°n>a@ê’ã7ûg‡®~hpLóS©U©vDà*!¿mA€PT6l%›±/S	X*u‰4³<ï¬–ép:Ó›qzGÄÑ_95»{N*R ŠfnÓ>ğ%Ø4+²l'âí—àM¬™Q<ˆş¥†iÄ§ñç#ìiZT¦IRMŞÅkN‘p";break;case"bn":$g="àS! \n¨¢\0¿@°xJš¦_ÀÎ:6\0šƒÀƒğP”\\33`¨®\0¾€!à(l	MS,¢ˆ¸†S,\$ğÕÄ]‹)•°d5s @qD<6(R©\$Šiìæ’¦VIà\nxÊ™+\rBÁbˆôÎ\0¦®©!²e4¡M*˜Ï+Vøp@%9…Õ;eºá2S'ë«	½š`€Ob±«M^‹bSÜ%UP²H§´)ëŠx2S‚)äÊzÊ†§Ÿ©Õõ4µÏ\0¿©èh3ªôQ©ÂÔóL<‘¢We–+l¥Á”ÄÙqrû¢'©ÕPP~9Üá•.-Z!N¹äêE“yÔ@h0Œ¢q¼@p9NÆ“a”Îe9ˆã©ÀÈ0Xè4\r/Èè0ŒOªöä”Î›¼İ(%º\0Q°ª±N²!ÎŠ6‚	Ğ¢€'Pº\n†‘îî5*\n`·9ÊzŒ;­{¨€Šbê»¥D5Ä‘—;h&†¦\r¢³(%\"(@;sªİ®±<GCğ¦ô#pÎ©µ0Â–È­jbV±»†îÄò¦Ò¨1ä–£»¥€*Ã[Ú;Á\0Ê9Cxä½ˆ0oXÈ7¿`Ş:\$OèáAR…9ôÉ¶²£zSE-« <ª7Ó3S\"l:ğ†Îº°€N‹s	+Ä²Ë©\$¯\nV†¶‘äràÓÅ\r9mûf®Sz¯9V‹œ;i0hj¸ïqüÖ¹qäÜÆNªé-EDYY–sº¸)ò\n ©³«ƒSwE¨å’ª›¯n®iú!p6TĞ¸ kš«z”÷l«”5Üà®ë|¸Å1*Ü6%oU­ÅscƒHÈ¦ ¹e\n¦Àø¬|ä¹e*µ„ÉènQ•^dMOÉh‰M	fPåÉĞº:2Vó„º\$T¿U5ALÔÁÅÈ<¿\0SÚ°\\šØbÖ0ĞÁ8©Êjl„ŞH¹úƒ—Gªd~·:ûkwd*Úì¹m¦ua:&u¨2ZİGÇ\0EğÍá¹L’V©åÖ#tCİYÖxOÛQ¾oSÉ×ùM”æé–çˆ­Åçi(jàÔñÉˆP€tÃ^ÉŸM¹j5íbXÕŞ‘¥.š}T¿õüşÙö®ïn·3½Í¢SoäÌäT[‰@t&‰¡Ğ¦)C \\6…ÂØÕóBê§Îò3‹ÁÏpZ‘O§),ú®ïÍŸƒsû=j½ÿªğÊna¤7À¥8çKr6TI¸6@ä!æ!Èõ†ğÌƒb]ªpª°³–šÕ³'v\0—1s‘ùl0 à¦DÎñˆ	\0…Â}İ3¤p¡Š.\nµx¢Bë³!¤MbwtôÂªXÀ°–¿\"rÌ¡[Ám/Õc(TBG½K©äÑ 8p\r0qM‚\0xO<Àô€è€s@¼‡xüƒd\r°‰A¨ ÎÃ(n‘\"DÀ¸ÁxÁ\$6‡êdHt€¼0ƒçú\$Â\ríıÊ\0ÂÏXiR©ü6†İ&a\"ªˆ‹&ØÚJª§oK¡\n›A}YôLN(ŒÊ@ĞzÃc1>‡sè\0b=aÁ?†e& aÑ‰H†0Æ~˜f³@6ğÎ—AÎ@gêc’ Ã&\0c’d4†ØÔáºm‘N”ªo×atï¼¿7‰ö@P–ÄS6ÆtZ•*BŸÊ¥bùf\nÃ´tŒ…ËõdJM8ÆP!ÀÙ_2’èg?G¸ø#è}ƒ+DRaÈ:”\n£”„öœ¡Ş˜—¹ŒŸåIùÍKMğA:©\rÁÀ:©XÊ¦§Ja¢PÏ¦Š¡Œ0‡U§\n³â ­‚\0†ÂF!¦üŞ92ÄTS,µxJŒïÂÈ¬ÆÑy\0yu½^\njÂgPÁ©7‡:‡×tèŠ	6¢1]PÇVÊé_A‹mgªJüÀ(’îÒõB¸~xŒAÏfîeŠdèhPá!R~›qLfJ\n×!\nâ.°à’HCÉå4´CÚ¤Hn”ˆüÁÀâOÂÊ6‚\0ƒ ¤\$ì‘3Ær¨™ÙMÔ±÷S‹qö|ÃE0¼@'…0¨ConduÀš—6”lË;+¦ÈYÃwh[c‚µŠˆ‡–ÆtÊXÌCJÊ­¿•s3Ú(§µÖÂÈWUDı Åº«‰ôşÎY#€bªÀ€)…˜5/Î8`©B¥sD\r2UJT{•s	=J\rÊ¡öDŠŒRM,q¬dÊ±´ØŞÏ°äTå±»>Ç,Ø@Äø\"qv\0Fp¶ÃÚ\0R}g8Ù¤¼–)š\n*­AZ_ §›Œ[]Ù£ÃâàïL£©i¶ÍŸdŒºË1Òv­åÜ·˜2´RmÁÀVác\r`‚áŒG=®E+”Œ4†`ó‹‹ØFÄA¶¯)	¥QÓèU\nƒˆ\0ô¢^/yÊºgHJ»…ûÅÌdQ¨Ñ§‚¿	¼¡òÚeU£›²Ä@şµÄÂÈ†²9ZÕÕ7mrÉ\n¼Áö[6åu‹–JÖÏçm¬á2£AlÖ^~ãf‚n”ÒÍâÒ¯ìÛiKp¸aå]\$•v(Ó˜ÌbY@©ªÆ¿fsy2íŸPÇ;l`¦Í+=sœºókò„XsÂg{`™†Ï•¬F¶ŒŞ/ ˜ğ¸mPJ)C\0®? iKÁYp ¼´c¨MŞ|;ZmäC\\r\n½&-îl±6>°á­D0Ê}fU1İ‰O2·«¹ZvÏ®NaŠëƒ\r®öÊªÛvw0Knõ˜b‹½ebm¶ß¬fd´À(";break;case"bs":$g="D0ˆ\r†‘Ìèe‚šLçS‘¸Ò?	EÃ34S6MÆ¨AÂt7ÁÍpˆtp@u9œ¦Ãx¸N0šÆV\"d7Æódpİ™ÀØˆÓLüAH¡a)Ì….€RL¦¸	ºp7Áæ£L¸X\nFC1 Ôl7AG‘„ôn7‚ç(UÂlŒ§¡ĞÂb•˜eÄ“Ñ´Ó>4‚Š¦Ó)Òy½ˆFYÁÛ\n,›Î¢A†f ¸-†“±¤Øe3™NwÓ|œáH„\r]øÅ§—Ì43®XÕİ£w³ÏA!“D‰–6eào7ÜY>9‚àqÃ\$ÑĞİiMÆpVÅtb¨q\$«Ù¤Ö\n%Üö‡LITÜk¸ÍÂ)Èä¹ªúş0hèŞÕ4	\n\n:\nÀä:4P æ;®c\"\\&§ƒHÚ\ro’4 á¸xÈĞ@‹ó,ª\nl©E‰šjÑ+)¸—\nŠšøCÈr†5 ¢°Ò¯/û~¨°Ú;.ˆã¼®Èjâ&²f)|0B8Ê7±ƒ¤›,	Ã+-+;Ğ2t©pªÉ˜„‹HàÇ‹ ç°ë‹'‰‰ÊŠªB„¾ËB¢Ú5(ÍÔÏL{,‚ÅSàKŒIˆèÑá\"5/Ô¥!IQRÂ<*ÀPH…Á gR†)tüÆ­£<°14ÍhÎ2#“êææ&2ÊÚ‡rÀ‚5Œl<°Â/ïë\"thô¯ÀP2%ğ\"X;O«¢X=1\"€Şô®êâ#ÁÃ¬X•ÙJÅ˜¥ªêÊ2¿ÔÔh9\\HEÉe”1æÍ«Ò?4İ×\rÇdŞ‘\nM|İih9Œ6€\$Bhš\nb˜2BÃhÚcÎ4<‹¬õb®‘¢‘B#h¿´ñkV¹¿‰ûn„)±(å•?ƒÂ7cHßœ%Âcæè\r’ó0Í'ŒÃ2«7/êf9YÕ¥1IHÊô¨Ñ5Ë%Â°Ãn ­U…!øÖŒ…ÿ!,h¸'p¼RşÂ#œ'\næ£€ÒÉÂÁ\0x€˜Ì„C@è:˜t…ã¿a,2¬9Ë˜Î¹ÜÆlçg9Ø^)¡ğ’6\r;7à^0‡Ù¤º4DÍ`@6Œ)‹%C—h«uºç}Ä£hŞ…¦±¬ƒ“Ò5³xşÃœ£‘ÀĞ„#é„»L6RÊ»ú3.ldN0ŒÈ>g{ŒcT9ŒÃ¯¸–ê/³\rï¦‚Œ,`@1ïsè]Ã™./Eğœ‡j˜9”DÅä<¤®CŸ¨P	@£¢d‹	* È0à†ÎÊ³Ö(¡Ù3JiÍJà.aĞÕ›D„¹,æQéÖÊjÈ	)z­”ı›(x«¸BHP9\"pîlÃõ0ÁÃ=×ìBé(M\$½15ñ|wˆ C\naH#!ÄL²“òê!‘¶6õk_ºª¨É»CÒs›#³v¬åÚÂ¥’4Läôç—êV	é‚`¡³zw”“0€'”Š‡–‰9pB7\"seŒ˜q¦©cş†ÂdrMÒ°ÆKt—5aÀ0š˜Ø˜‰Yî @'…0¨È ºÊCµ‘â\nîÊâ!y\\â4hŒ‰²˜!	21—\rƒpf!D1ê³¢¬QÛÙS>†}436¯OÚ%Œ%¢©b˜Q	€‚i2“J@B0T‚„i¡¤„ì“í„94ór£H	&\r!èó²r?Ìò, FœúEè4\$Ğê7Ğõ*rµ\nz‰X†7²4`—uvËİ¢ÑÂè®×åQ¤“Ej:®Ø0CKÁ°¶sÜŠÌ;“9<êutkAÓ€ÚJ€8§ì*…@ŒAÃ-hš’å*ß#Œ‡L¹vÕx‚É93«t‚¯ZB*ÔW.¹0»7†fåõd•\r›bVO)…'Ç@7ÊÂ<ƒ©5:>gšCLIñNGÒœ—·š@l9>3j*e¤Ó)O\néŠ(hD!°Ô¶Å¸/Éğ*Ù´Tşh‚»Kf¨pÒÙ’±Í­ûds|6äÊ)Úò_éƒ%œTxß˜BvŒUÇZª²+<x,±›®ÄeÚ(ŠF@PR·ª\0";break;case"ca":$g="E9j˜€æe3NCğP”\\33AD“iÀŞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvÖÄ±ØÓ3ĞñÃ©Âpt0Y\$lË1\"Pò ƒ„ådøé\$ŒÄš`o9>UÃ^yÅ==äÎ\n)ínÔ+OoŸŠ§M|°õ*›u³¹ºNr9]xé†ƒ{d­ˆ3j‹P(àÿcºê2&\"›: £ƒ:…\0êö\rrh‘(¨ê8‚Œ£ÃpÉ\r#{\$¨j¢¬¤«#Ri*úÂ˜ˆhû´¡B Ò8BDÂƒªJ4²ãhÄÊn{øè°K« !/28,\$£Ã #Œ¯@Ê:.Ì€†Ê(ÃpÆ4¯h*ò; pêB+˜ºÉ0ˆ9ÈË°!ÅSüí,€’7\r3:hÅ Ê2a–o4ÑZ‚0ÎĞèË´©@Ê¡9Á(ÈCËpÓÕE1â¶¨^uxc=¥ì(š20ØƒÃzR6\rƒxÆ	ã”ÊÈ	†Z›RâÇ3Ñ”r9gÅ+Ôöº²”Í§0e•	a¸ P‚Œ¨«qq\$	ÏI¢(Ü×2˜NÍ;W„RŒvÀËm£¹oP¡py0oµë4^ôıòü_q%¶9[¶üà’²@	¢ht)Š`PÈ2ãhÚ‹cL0‹¶•ûu¯Pu&ˆ‘¨ÂßEê“¯Y¢£›\$ÙÜK£7bb&Cªüš6L\0SFÒ¤¨èŞ3Ğí+¥ít99êò7R·ó!¬zİ*R8[)¯hi¢ŒR›L®HäşC#¢ë–º6üĞ9´¬4½&\"küÜ\$ĞZ1XÛ†ä2Â\0xš\r Ì„C@è:˜t…ã¿<#éµ*˜.£8^ítñ3µ ÁxD¨‡È¤-MÒÁà^0‡Ùª„İ\rôşìšŒ#Z:–RC’}J¤qÂöW(ê†ö!,\nãeB\n6Nò¶hQèĞŒ7õªízR1#¾˜Ìº¨TøÂ3p5ŸEÌPA`¯·Êİ1úJ›LŠY4+·”aÙû«m¦\\Á“aÒ#+­jP ‚A‘7‚\0PTAJ\0F¤YBäpŠšéì\rÁœÙš³ZkÈCŒ5eÔ:&¢\nòÀ\ráİÆ¨÷Ì¡Æ ­©†7†}ÔGH)8…>Ì\0c\rÔ»¹e@n_ñ…B†ı†÷„}‚S\nAã.ôÚMÁp \nÜš#5ŞŞÉ9V}†)#¡çHÂ¾x…­¤¨‚N…<\r¯hÂ‘TZc2Šp’\"ÂbHˆy4‰OÃ‚ñ»QæT~dAˆ¬Ä“ìÖ	ÿ7HÔÕ†bĞÍ‘8ƒ¡@'…0¨A”aö'Ä`švæd£HRqÔåA)dlŠáy‘NĞ‘¨rŠâßvD&m²ÜÖƒn*&ŠI˜SìmV	#Ê€»‚\0¦BaH#€x\0Œ Ê”Säö\rœd\n¥‰F ˜ïÄ{\njFGc4øC¢ºCÈ‘Ê?ŒÑÓ%ä’†z¥¦İ'.ô4’³\nÂcŒÌŒ	‚)BkG(ñü*\n~‹’4à‘\"\r0ÀW*,ã¦SI`¸R²iB…\$ µ`“	ª@¯¢2‚\0ª0-á|˜èWA‰†”©R™äj˜\rûçÚzUºAWC‘õi¶3B´Ùa%~äĞÄ˜°i@ycÍhí&U/0Œ[,I®0Ç¤8‡Ÿ½\rË\0000Œ1N¬\$Ùx´œÇR’Ldê§‡è™ùÅP\"	·Yz«ğ bÖ±8aÎ.ÃXâARaŠ¢‰6®Š¾e\"Ÿ­&…54¿œb{X+X\"‡ˆ6 ªÒ	LJÔ¢²öpıÍ•uGP0Ç@QÑ\n";break;case"cs":$g="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ği6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤»7ã÷»ó¶òI61T7r©¬Ù{‘FÁE3i„õ­¼Ç“^0òbbâ©îp@c4{Ì2²&·\0¶£ƒr\"‰¢JZœ\r(æŒ¥b€ä¢¦£k€:ºCPè)Ëz˜=\n Ü1µc(Ö*\nšª99*Ó^®¯ÀÊ:4ƒĞÆ2¹î“Yƒ˜Öa¯£ ò8 QˆF&°XÂ?­|\$ß¸ƒ\n!\r)èäÓ<i©ŠRB8Ê7±xä4Æˆ€à65«‚n‹\r#DÈí8ÃjeÒ)­Kb9F¬„n BDŒB„Ñ5\$C›z9Æ‚ äÖ;ëèáA»å´.âsVğ¢MÀ×#„£ @10°NÓõ}QÓÕ,¹CÜ7PÁpHVÁ‹İ55@Ö2DIĞÒ;<c*,0ÎÀP˜˜2\"×½Ã€æô¡kÊŒB}€9¦³\$q@¢Í@ÚÒ1t3nïÍ³mÛÀP„<'?¤CtIO¶°ÂŒÀMŞ67•Ùzà5%ókàíş^p]ê`×Ò0¹¥p¹ˆGÏ¢@t&‰¡Ğ¦)C \\6…ÂØå“Bí£iºïğ-4ÛÄƒš®”8	ÈÙš+0¸Ü=)ù´œD¶+è0²w<	J3<3Ê©Œ´^«uĞ…\r\rr²åj„ím^4#HÖ:kå3¢úÍ&Ó\0õ³éËò4ú5pÛR\r²‹`Û75º4ìÓ²¸;FÕ²Ò	Şšî;Ñš6;•^;oW¾Ã¿G×ï¯p‰÷\r²8§¶M4Vò;§)»òüÎùÎ%vÖÜPÒ‰²7ŒM\$ÔÎ.Êlú çC\r÷°íTœÉ¸ÑûlÖÎ£i¼n°–ñÌA¶õ^£A#DšôLŒŸùsöú@2ŒÁèD4ƒ¥¤áxïı…ÖFú€‰Q)à¼1‡0^ÏIãÈ\rÀ¼\0|Cjc©t7\"´.xaÍ…‘2˜T‰€`)ŒÖ‘‚4Q‰exĞ)ë%ÃH“0mm	¼11zI	Á:R‚¤•¬äf§ÃªÀ…¥`ã€œĞsí\$ô]Kw™ê´àÔMë}u	¨ŠŠÚ„CLHNa¤•—’ö™xz;IXL»’îA\0d(¦¼8&cÑãr8‘œh°~\0P	@F˜Ö+WT@ ÔĞDƒR—1Q†F(gĞÚ'’è\\Ğ’ŠäªôƒÃBA´¹˜ò9\ra»q•Å4<ÎE\"rOäq.´fˆ‹Ş†ÍØ5“À@Â˜RÀ¸-¥Œ(IÛ4Ä¦:¡2å›É+_í± ó‰1)/3„Í7ÊE(/Nß‡èšÌÀ´òÎÓ4woa	4P âTğjn¬ùÊ‘#²\"*äI#(ôC#ÿj¡…¸—ôFkÜ©F\$2M³·\"¸P¼\\î°xB€O\naR8Ÿéİ›4\"…ı›·yàõ!o\ræ½¼ÌC8u8b6*äˆƒ¢Ã`¡Ì•…b‚ç@S\n!0’’r­+|®f„x)ÖCzn&Á*HC~L)±Fè!»‘ÅÕŠZ\r'GD_)µ>¼\røs<¡ézŸµZÌ}nUÀß³^Jz’Dzµ) ÂT+zd'æàWi¶jÊ¢…îjº\nÉòğ`6Aaš3JÁTõ•²æÌ‘•äulì/b„¶‘ê JÂtA°â‡gª™¿S\$ÔâFã_š¬y?Íš¥ÆiLR&©È¢=…?\r‰#ÁGbÎ9eê›Â¨TÀ´M¥à+°vRÖ´†f¯¼WZIÚåyZMç´×„9V&y,µ®b‘¼‰DÑi”CèZGÙ˜&ÎËî8n2* ­ÇSHcÑ]AÔÄc\"ÈåÆ…æ¿#Ç+LUz>BhUš56‡0¡ÂÁĞÍú&ËNÉÛ&Ô­#„ì\\H¯aâ\nvÉz©²ÖQIÙv (!”‡u…ê5ˆ„)ç†°Z¨2Ëâœ¥“ÃZ¬	ío—\0ÈË—Zâ°€¨!™B°yW”®’ÒÇƒhø¡?\0(*‘Æ(˜3\n²{á«k‘ø";break;case"da":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤Js:0×#‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚†óh(Şr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœe²ëåæó8€Íg:`ğ¢	íöåh¸‚¶B\r¤gºĞ›°•ÀÛ)Ş0Å3Ëh\n!¦pQTÜk7Îô¸WXå'\"h.¦Şe9ˆ<:œtá¸=‡3½œÈ“».Ø@;)CbÒœ)ŠXÂˆ¤bDŸ¡MBˆ£©*ZHÀ¾	8¦:'«ˆÊì;Møè<øœ—9ã“Ğ\rî#j˜ŒÂÖÂEBpÊ:Ñ Öæ¬‘ºĞîŒãÈØß#ûjµŒ\"<<crÖß¯Kâüà;~¶Ãr&7¤Oğ&8²@(!LŠ.7422Ö	ÃËBØ\"èl’1MÃ(Îs¨æ\rC‹@PHá hˆ)§NàĞ;,ãšÈÍ'î›p¿‰ƒHÚ4°ÂC\$2@Î¬Â\ràŠ²)(#Sğ©N'ÀP¬¾\r Ìé©QŒğ¦U,ò€Àtï\$¶\nn‚×6ş:B@	¢ht)Š`PÈ¥âÙ†RÛvéJ.ÖU#j2=Lrº¯\nâ³Á7B0¢8ˆ\rà2	¨Üƒ\r÷ºOLªPÙBÈŞ‚-(Ş3Õ\n©E¡P\$U06£¬c/¸°\\»,e”)¾ÄÎ¦ 8Ø.ÍZb¸İğDŒ±	:S~…£\\¸2¿Ñ¾@T\$nàÂ\r	èÌ„CC.8aĞ^úˆ\\Óh»Î³Œáz•­^ªV<„J |\$¨ó`¥&£xŒ!ô9ëDÛ]—ƒn€´\0Î4©CS6Ñ\rc£Mò‚¾ÏÀæ5­°hŒyK3©8¨Í3ãcÃé@»?(VîçÉ0^ÓÄc:3¬ôÔ¥ó£ Ğ˜s˜Âç„{´\r+hæ“®Fx;\r0z€Ã®x¶æŠ¤C’p2ìØ@(	€[‰x2„(NvÎïe4=–abò‹óRzaº£Oˆ¼.RKî97(Ëâù³í[Ä¾rÌÓJSÌù?N¨ã;B0ZÃ€uoçìş‡\$’Ã@inÍM™“Bè‘a„:”NR\nC-&„!…0¤ic!%-“šôœqÕËtp%)™¢XKŒúhq¡˜ŸD°j{qní“!pmP#+@æ…	–ò\"Xx§È7ŸHbì =!ÔøÌu‰xATÎ¢–Èùí‹Äı(jJŞ˜O\naP¦wHTC3k²êˆm4aœ‘ ¢\"¹£C.å	FRrNÉê)a¥u3UòI8uU®m3‚ã\nY#ä„ ”²p»˜Q	€µ 7z0T\n¸Œ¶U.ßKœ_he\090èh‚(m\"é¼€¹nMVTÁ˜qÜ8H‚£2fe^s¼¤‚N®Ómâ\"°V¼jÇæn™¼ÏÀPCC°†´ç ¥mèäS@é(İÌù¡4a’\\ÕV…H+Œ3ÓÑÿ‚\0ª08…!”3ô¸“æºI1B˜Æ3µ4üÛK?œ4LÆ¥-Ÿ¤Ï\$á,Éš+=)‘&¨Ö\0¡†!\"Å¶B’ ^Éœœ/æõ)¢O\rø-T3Â|7™÷?H± …õàF)Š)#!?{TƒÅCäÁUšOˆÁ=>«üĞ#täoY	£u¤¿…bÚÌ0K#éh\"’º0[éiQr6ª“S\"ÑPT.ªÄ)JDT";break;case"de":$g="S4›Œ‚”@s4˜ÍSü%ÌĞpQ ß\n6L†Sp€ìo‘'C)¤@f2š\r†s)Î0a–…À¢i„ği6˜M‚ddêb’\$RCIœäÃ[0ÓğcIÌè œÈS:–y7§a”ót\$Ğt™ˆCˆÈf4†ãÈ(Øe†‰ç*,t\n%ÉMĞb¡„Äe6[æ@¢”Âr¿šd†àQfa¯&7‹Ôªn9°Ô‡CÑ–g/ÑÁ¯* )aRA`€êm+G;æ=DYĞë:¦ÖQÌùÂK\n†c\n|j÷']ä²C‚ÿ‡ÄâÁ\\¾<,å:ô\rÙ¨U;IzÈd£¾g#‡7%ÿ_,äaäa#‡\\ç„Î\n£pÖ7\rãº:†Cxäª\$kğÂÚ6#zZ@Šxæ:„§xæ;ÁC\"f!1J*£nªªÅ.2:¨ºÏÛ8âQZ®¦,…\$	˜´î£0èí0£søÎHØÌ€ÇKäZõ‹C\nTõ¨m{ÇìS€³C'¬ã¤9\r`P2ãlÂº°\0Ü3²#dr–İ5\rˆØZ\$Ã4œÇ)h\"¶C¤ıHÑœ¼(CÑ\0ä:B`Ş3  U9ÃğÚö»ÌdÀ:¡ŠFiô‡ bò’!-SU¥ PÔ0Kİ*ÁpHWA‹¶:¹bş6+CŠ¹I+ÛÂ¨Èãs7Bz4¤­F³ª+H±‚(Zš#`+Z¬(èáŒÃ5¢7\rÔß6ˆ#\\4!-3WõÀ¯Éeçz¬j}7æİŒWò€&cTÂ=R@	¢ht)Š`RÀ6…ÂØÕBí¬Å·c¬>ÍJl`ˆ¦¯Ëz¡ƒÁIàİ– Ñ†c£Ã„\$šf&G\\å/4C 7İ6\"öÏ¡ƒ²ãxÏÛ-7C²µ—!“òV6\rğ…%J\rÁh¬†Bî@\\D’8A62Ò4š¨ bjş Ğ\" )ÈØ:¢=« ÚÈß­ë¨6¾€ì[%€…ìûJƒ¶\rûs†î8>ç|nÔKI½\räî&zƒ\0002?Éàå­Yªó>ÅYã8æ25«~°ªP75¶6ÕÕ/oãw;ôñ¢Eƒ¦¯0äÒôÍGBXŸw{8x0´7@z+ã à9‡Ax^;ür46 (`]áz6ç9İ¨7á¢	#hà·ÍO‹„Gà/ ø‚£c‘€ML! 7‘³Z•™ÆDåeór	ÊÁ&hêã\"ìI9‘:¡@\$\0ZÉk<3a“0sxZ±[ åè™…BnÃ#¡İp“²ş ’~‚a”†Ìu:Àp¤3Rv×Ñ1N„:CuJš\0c8mI“¦|eJùGHÅÃüi	N'K­ÆölU	áƒ¡ĞÈ™ÆI	!0EŒgN3.ò:\n\nˆ)z8 £D@‘ C\$îÎ4@.X·’Â†”{š`èTİ˜!©Ş)¹MŸ‚˜Gb¬§	©…@Ãºôoo 3•ôc\$!¸cv¦Ğ™„0¦‚0 \n½{ôà/‘Er(”ƒ\"“üN0îÑ’Êğ‹òÿkØª@brMÛóª'Å\0ƒ'`ô”‰Ú)âW¢dKør^eÑµ&Ñ3{ª]¢Ø…˜0®GÄ™ÈA;cî\né«¤t †GĞ^Îªş#„l§š\"şï9+E)¸P#fA¡De&a@'…0¨L¹ \$”`ŞR›9©uéÿĞ›‚9G)%,@ÕBÓƒ‘F)pïÀYši'ûÏF\rÎu²@’Ã8u>ğé×`ÖRrÊtD—QÂBe(Tdš	N°¨\r	%DhÒí*Ì…6 9T şİ5AŒíS¤FÁÓ)Ì°25I_C½«•w\"›\neÕ)œF%\$¸YOHg°«à ¨ğÒi¡òkiT5ÎXKX“l“`aNÄ|EN¤’H¾ÊÌµc…Š`P¨h84°5C2L×Å±*»É„rVÜÉZædÍ™ÚıeHé8¹ÈéÒ²`ï:#Õ/«\r—‚TÂ«Y“bDğ6J!1€(Ô‘˜tzÎ¹ˆ¶J!#ÑÚGZµ©ZØ_¨ÊŠ(û¶¤´™À ĞŠ–¸ #-IHÖÃ·s\$‰˜–†Úu	`b+¡ÍT**øg&T†i­LK»(NI¶Õ(%º.Ûo1ç¹u~r¼f\0Á\0¬†mì1˜Å†w‚ğ@";break;case"el":$g="ÎJ³•ìô=ÎZˆ &rÍœ¿g¡Yè{=;	EÃ30€æ\ng\$YËH‹9zÎX³—Åˆ‚UƒJèfz2'g¢akx´¹c7CÂ!‘(º@¤‡Ë¥jØk9s˜¯åËVz8ŠUYzÖMI—Ó!ÕåÄU> P•ñT-N'”®DS™\nŒÎ¤T¦H}½k½-(KØTJ¬¬´×—4j0Àb2£a¸às ]`æ ª¬Şt„šÎ0ĞùsOj¶ùC;3TA]Òººòúa‡OĞrÉŸ»”¬ç4Õv—OÙáx­B¶-wJ`åÜëôÆ#§kµ°4L¾[_–Ö\"µh‡“²®åõ­-2_É¡Uk]Ã´±»¤u*»´ª\"MÙn?O3úÿ¢)Ú\\Ì®(R\nB«î¢„\\¥\n›hg6Ê£p™7kZ~A@ÙµğLµ«”&…¸.WBÊÙ®«ê\"@IµŠ¢¤1H˜@&tg:0¤ZŠ'ä1œâ™ÑÁvg‘Êƒ€ÎíCÑB¨Ü5Ãxî7(ä9\rã’Œ\"# Â1#˜ÊƒxÊ9„èè£€á2Îã„Ú9ó(È»”Û[Òy…J¨¢xİÂ‰[Ê‡»+ú ƒºé\\Œ´FOz®³¦\n²¼]&,Cvæ,ë¢î¼­âü¡°­[WBk¹4µF‰9~£™älD¹/²µ/!D(¤(²ÒH@K«­Câ•–êü=A²ƒPX¤¢J”°P¥HF[(eHĞBÜš˜;©\\tÔCÍê¡%%%ÚÂğ%Ò*d«7î´ƒ½2PÙBğËPÜØoD@gFuÓ¼—4È¤®˜ÈdÓ‡nµÍQ×ªûªKq8®\$ôŒ„—cn4˜c¤éœ¦;êòáI	œ–ŒŒ\0Ä<ƒ(æ¹¾r¼\ns8›(%È¡xHéAŒ	 –Ò^ ³Š²R^ª5êÖ¶Ğ¦±Ú¦ÔB—2“¹ĞÛ”]×ÅJEàPŠ£Ò6D1’@LenòAŒB	=¢•©oòŠ ¯†Şâç“é»\r”æQRíå¸]æ£/»òXç)yQíiz£'Œ&qRÄß[Ö:\$¢Ah–áz^^âÚ„¯w‚îÚìŞJa|õ;\nógï«€\"\r#œÖ6Më A2Ì#wŸèÎ§¤2ÈÜ9#¾»õÈ˜D`è9\$•Ø…Ä¿;¯Q§	³”‚äÉ>6¹÷ŒvBù_„YÃ‘ğÉØâÄ ­«¡7*íŞKè'Å|­uÈ_KQª+dR+\$G‚c/é”\$\",	sÇ;L‰S<CmEb!Í:6ò´ı\\¼jĞQà\$( S	<!tJ† •^rOšÎ*¶¸BTËÅ‚\nƒâfabÃ:ğ¼¯Ã—\r	rò†äV“öTÅƒçù<EÔŒb)((x»‰xE^2ìB­õĞ!‚\n b×>ê%(GxMJ˜%Ñp“ÆR@\" z%Åé‰+åüD;¬Qoœğ@ \rÈ2†`zƒ@tÀ9ƒ ^Ã¼±Á„2ĞÒ“.L¡œ†Pİ/^ì¾|ˆ‚\"èˆ`gJ!F¦à/ ùOr”ßK)ñxñ€¦©µèTO‘Ú“*E¦@vT’„9¨]Ü}QInˆ3-IŸ(ààŒÖdh\$ò0VÉ¦´h‡„‘c%LQ‚ hMá„1‡GÂ˜»wr!‰7‡Ä“(m¬Ô0†fr“ÀciÌ9†`êäC`oòÜQè/Mï:\0Ç)\$¾¡Á„65lkIZÓ‡Mõq¡È­ÉMAdıN“r äñb¸º¦R ‚¯Ò2µ>€H\n\0€@S\nN’¸>È©Š’Ês”/rÀ(!¾)qCe¸g¦!¼\0äC³w¡×Ôøju\réŞRïFèE\n”€‚ÄÊæŸ©”LÊÍ\0êŸSúLÔ;†€Òé„¶ò¥›&û8ÃuMÅİ%*B%AD3¬\$§\0†ÂFÌëÄŸ\"˜\n&„ØŠ³¿#tÂ”Õ¶‘œ,ª4úp¤:ÈàSÍY·jæï(eKÈ€>eÁÊK”)?I\rE¸ı3ášªiæâÂ%1q‰”å'ç°š©âôJHSakß•@e¬·LR\0ö¼C3Kò=dÅ\\š¼¼‹Y‚?BŸä¼¡Œj…Nw\0Â¥ÃcĞda¢bxUÿ*‰U°8öŒ	’6×à„±äT©[É,…ÆL²\nº'¿Lz3•™×¢ÍGlÈˆÃ@”U;Äˆî¬éÆ¼°9‰VL(„É¯\\	È ÁR±È9Ú…pr+7sŒ±¼J™ƒO…hæf\0°Xê[™z×fY¶ÓPbRÑ5ú¡h–b’²^pK4¾è?¤ˆF”eÚ;K¤·¥š‘A,µÎ¡ÕB…pQ¯.l×JêBe¦!É³*Ú¸¯k|¢#Ö¬Ã[²·ú3”*Î(!¾°Ø\nÃl´á®)“²xrQ/Èr=ÎìŒaõWíK0©…VX/”/å\$Î‘Cœ¨­îYBF)±3³¡kt3X*…@ŒAÁFŒÖ¯ò)ŠNa»=©!9wÁg]ZÊ:§O¢Ê¸tÔïh5°’—8K§ÔB™ â^¹àJPb¼ƒ‘œóo¦Ä) üğ·ILg8L §Sä‚­Çä4SMÑ¼Ì6W%¸ò&„QEı›µ%\r©·è.¡mÃ¿·¯Ì§œôÜŒ¸6É+ÅÜS¼iÑ<+%ÙBÛøÆâ²ók¸sºéaãFæ¥…±qcû;m±„6ò¥ja å3ÀôæÙÃù×º.cj•}İ*#Ö¸³Â+tŸÛºÑßfö?\"ÓºÜfI¿5§Ó³2BÔ•SAX©JbÃ‡¸=º9GÑ ¢V¡y9÷óùv)\"Tıå½}š}?D(";break;case"es":$g="Â_‘NgF„@s2™Î§#xü%ÌĞpQ8Ş 2œÄyÌÒb6D“lpät0œ£Á¤Æh4âàQY(6˜Xk¹¶\nx’EÌ’)tÂe	Nd)¤\nˆr—Ìbæè¹–2Í\0¡€Äd3\rFÃqÀän4›¡U@Q¼äi3ÚL&È­V®t2›„‰„ç4&›Ì†“1¤Ç)Lç(N\"-»ŞDËŒMçQ Âv‘U#vó±¦BgŒŞâçSÃx½Ì#WÉĞu”ë@­¾æR <ˆfóqÒÓ¸•prƒqß¼än£3t\"O¿B7›À(§Ÿ´™æ¦É%ËvIÁ›ç ¢©ÏU7ê‡{Ñ”å9Mšó	Šü‘9ÍJ¨: íbMğæ;­Ã\"h(-Á\0ÌÏ­Á`@:¡¸Ü0„\n@6/Ì‚ğê.#R¥)°ÊŠ©8â¬4«	 †0¨pØ*\r(â4¡°«Cœ\$É\\.9¹**a—CkìB0Ê—ÃĞ· P„óHÂ“”Ş¯PÊ:F[*½²*.<…è¸Ç4êˆ1ŒhÊ.´¸o¼”)®ZÜöH‰LŒ!¸“şÊ¢`Ş¸Îƒ|•8n(åA–2¨œ:Œª<´ÊÌxJ2ò¼4İ;O£ PóR­ j„XTšÃ\r&gD¹ÎjD„J¢xå±cÊîˆ3…k[L,Ä©ËLƒ+\"8®x‚2\rC­ª9¦£sJÄTC-œ–/6ûœT4åÄ0´ÈÕÊ4Æˆêh0Êtx\$	Ğš&‡B˜¦ƒ ^6¡x¶0áº\nÑƒpòMı.u¡?©@¥ŠóŒ¤Xä#*Ñ<â3¿CdÀÌ³ikŒÃ3È7+.óìÒ¹ÍØ†ûQéRVÔNu¢Vğ’åˆFåeJ€:&z=½0ã ë¬Œ0´ƒ	¦NHæ1­ïô\náMCJ&Lü¼%PHçÁ¬€à4±p@CƒC3¡Ğ:ƒ€æáxïÅ…Ñ Ú´¾ÁrÜ3…ëÏ*<dÑ(Ü„JP|\$¤©”â‡xÂchÔ”:Jtæ¨'#ZD4Á²sœ8¯ĞÊ12HÊP•3ÃMÚi¨Ô@h|Ò2š\nƒDŞã8\0îÓ%â6ûËt•N#6áÎÈæ3©`ÙC­>—h465ØÃ%8[Ë¹x\rŒÃÏ89*ó¤Q\"sÂ¶âxè‰ı¼¢4@P á½¼P@\n\nP))ƒ0æGA g*Éœ3ŒZQ£&&˜„œ¢6[ƒ¡F\0’ĞØùÃ¹Êy9™Â´9Ã\nq:´ê\0ê‚RWïH˜÷`\\\$N°‘t0ÎB ovEè!…0¤ v §‘s‚\0¬¥`vCˆ¹o/TùÑÙ¯#©¸–=ä_*~j¡<'kûN'Š£G`OÉ\$‰¯½=xŞíªò@•6\"C«£6 ’&YŒw…½ƒšlaYŒ*P¡\"A×qìà•DÆ±\"Y²#a„Ô ğÂ¢?‰¸œ‘åâ\\{(`¸%¦´Œ:B'è1Ò[\$Ná\"Du¼'rc Ä0¤)G†6®êI¡š3†½ÇÏãÂà€)…˜Ò˜Òß*@©„HÉ,(\$h3JrÎÜˆ\nRèÁL’³Ê†×=!4†;a2ñ&”Ëö8ZN±(¡+…ÑÂ.÷S½]\$­qQâ5H òñ3\r0ÀVšÌ4LÌ2’ÈÄùÛ‰)EÇ,”¾rh¡#°Cë>ª0-`73Z‰¢¢2”19Ï“®¹éS¢°ª«Q¥ä]JD'#Ğj’Œq\rüÓ6‰TÀ˜0ÌXN*ÎhĞ¤A7‘2Ü\r´<Â˜svN1ä‡TÖ¦WvÔFŞh²ÍG™0Ê\\ÃKQ½áUõ\r«Û35Ä Yzx‚Q	U\$2âƒB’#.—ç\rĞ¥õ4§*Ò™«4.­³ªÌ^\"±|èlİÇHyêéˆHb¿K¦¨»‹Õk[QŒ¥Z(¦Và";break;case"et":$g="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ| ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €é:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp­Æ÷Aßš¸'#<{ËĞ›Œà¢]§†îa½È	×ÀU7ó§sp€Êr9Zf¤CÆ)2ô¹Ó¤WR•Oèà€cºÒ½Š	êö±jx²¿©Ò2¡nóv)\nZ€Ş£~2§,X÷#j*D(Ò2<pÂß,…â<1E`Pœ:£Ô  Îâ†88#(ìç!jD0´`P„¶Œ#+%ãÖ	èéJAH#Œ£xÚñ‹Rş\"ÃÃZÒ9D£ƒ±ƒ\$¾½ŠH2pÓÉÈ\\ß\rÉ2Ï¾( &\rëb*Á0`P”à·²/¡¨dşÁ7èHä5¨‚*@HKK£#¢Î<°€S:°\\•8b	óRÎÉ\r,–0LFµB€Ò4KüPÒÊ4|ÉB(Z•¹B\\Œ†•ÈÊ™RK:n7(Ñëj’7)%dª!àÔ:‡PÂö7#ÈôX\$	Ğš&‡B˜¦*£h\\-7¨ò.Ééy6Ëñ¨‰H6IJOpÜ¹ °Â´áOpğÖ\rÉĞßˆ¦¢dE“Ê²òjR7ŒÃ26¶{7'P\\R\rğ'¸9je@ÏIê:ZÉë\n£d¬HÒ7âhÛ\$ğZ¨%PSÚ6f @¡·hâtÄŒ©ªnÂ½úK,.ÃÀá^ Áp@7ãDĞ3¡Ğ:ƒ€æáxï¹…É#¬÷…ËHÎÂ›æ\nbCp^)ğ’6,¾7à^0‡Øl¾×\rè;Nâ§	J¤•=ãk\n™î%‰Å|ã4’ |SŸ¾ª¤OX„ÇOh#º46Ÿ89ËLßØŒÍf\n¡c9ŒÃ¯q¦-ol×4İ€æ0Ëá\0Ç4!œ`Ò™i¨Š¨)ëÒğŒÂƒ#¼ÀdÑ\"•á0ƒF4õ—ZƒŠ@¡ñÂp®°ÂÊŠ@RMB'®Ì…sLgƒ 4Fƒ Ô ?Ä64ÀîØK‚±M@ğæ€Ş4=¦¹ÍààyšÒ@à€;–`Æ)kmnäÖ»\0ÆV©´\rèÑÏ0@Â˜RÍ!†ÄJƒz*0Í8;;æZ‹V'éÏÂZÌMñv!É!‘â\na‹ÓbA1ö”\"ˆùCNC (\$‘@òe% ğLÁ·£S@qŠğ3Ú\nn%ĞÆÓw}q¥ª«Â -_ŠÈ”¹èfĞHÛÛc'ø¢F&”Z±!r1ØµúAÉq0“‰¢QÆ§Ö€-0kiĞ±¸á\rÏi©i ß£HÂˆL˜ÑJ¶0T~é¶8…mì}KÄUô‡\"jwYÙ†nìİœ›¶x‚¬P”sl—ÍÖv÷NâŞ¬\r `êbäÙĞŒ\$Ø—­øÀ·’”Ek…M“T )™S‘'ó”SÓla¬™µ%–\n\\Å8Ïñİ @B F áƒ7+I«‡@•O. @Z‹ò'.D4\"76Ã*œ¬êj>ƒÈ\n1fdÒåšÒêkT¿3\n\0)\nÕ8§ƒ’yTML0LŒ„±PŞêii?Ô¿¨ISøeV!®/³BLN¸T8(L™­Â¦â–ª,St˜rèìÑèKiŒMb“šFYé,ê´…Çe51\$mMf—æ[Â’+ (";break;case"fa":$g="ÙB¶ğÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\J§ƒÒ)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½/ÒêH´r–Âæ%†)˜NÆ“qŸGXU°+)6\r‡*«’<ª7\rcpŞ;Á\0Ê9Cxä ƒè0ŒCæ2„ Ş2a:#c¨à8APàá	c¼2+d\"ı„‚”™%e’_!ŒyÇ!m›‹*¹TÚ¤%BrÙ ©ò„9«jº²„­S&³%hiTå-%¢ªÇ,:É¤%È@¥5ÉQbü<Ì³^‡&	Ù\\ğªˆzĞÉë\" Ã7‰2”ç¡JŠ&Y¹é[Í¥MÄk•Ln¨ 3ûêX«nÌvî%©;C ú–ËÑl4îB:î›Ê“2sC'³I’ÌÈ1\nÀ”IÛôB¤¬i^Ÿ\"Ã#ÈÏ!ÀHK[>µÁTÀ¤ôáÀ¹®Ğ!hHÙA«ü²DB:…–3S£¨\nÓ@RÎ+úû Š;ú²ÕÌ	rë‰ÚC_¾ÓC £±¤¤§¦ó~XÆÑqR¦‹L¥=OjÂ[2l²_&Ë\ræ…\$ÅüÂ•«|¯²[\\†ª	ÄêŸ×Uã<€bÔÆ0âJÉû;Ñ°\$	Ğš&‡B˜¦cÎl<‹¡hÚ6…£ É-GÒMT%oí†\"\r#œ 6BŠA@Ãv—¦Ã:†œ2 Ê7cHß®E)İÿ,C ØØ6I)D«&êê&Fxä´µ2Ã1¶·ÂÂÒTk.Ï,ôC@£ÉK¸ÚFFÅÄlŠxşI±”<äe\"’JñRBŞËstæˆã›ìp®ğ.»‡Â\\3?Ä(É]Õ÷%ÊV|³D’¿\\Óy!óÄfé^Éœdˆ•I-Şâ•‰.Kº*2¶WìZÛ«ÒÆí¨¯Ø¬;•ğéË–÷•9t¢	Ä±…{ãY/(ÊArK½wztvƒ@4C(ÌAhĞ80tÁxw@¸0†@Ú{8.AAœµ¸*ÖZÛ]kà¼0|Á×R8\$¬`©‘\0xÃ>[¦aÊ#ôtÚÎh„…U#H\\Ÿ*ñN¤<ˆ¨Œ	\n2y§å[¶#lLÔûKæˆ‘2`¨ aaÑ¯ PîC`l‰\nPmªØ0†f´èch`9†`ëƒ`oç°EpèwB*1\0ÆÿC#[Š„6\$ˆtŸ7,ÅED)õ\0¤ˆR.!	€ë+b½	¡T‘)aÒ\0œ;'pø8Ö6JAC/½ªw:ÜIY±‘E\0!µğÜb™ìñä7‚\0àƒIëi1ËäB†ZJ\rèrBGïÊO@èRd¿ æˆãX ‘êmààQ\$DÁÉ[pĞCxáE´)7a¨NZ0¤¥àkkn•D¦„Äm‹Ü}o~RdÊû‹)%,¦¹„~™Z)3+.ÀE®TÍ¢VnIy¿'²‹´20’dİ›ÔpİI!¼:¡PÒ­ÙkjÚ;Ì—úCªC™†Ğ@`té†8â„ãÌçC(b¢Xä²fhÆÑ‡±™`ZE‘- 9ù8£%TZ)(L@…ÒfŒ‘‹#Ó8Ç\\¦bIHN1âFkèâ’y\náôWšHÃ“xÚY¦?E…Ö„”W‰ÀS\n!1Ö¨V(üëŒA\$¦œ˜•çR‚¤  jF½‡°\"cv†ÍØ§>0ï\në¿U¯JÕãâ ^QjUŠºÖ¦#&âj¬?”Ì” ?kV•ëã£¬Hl[õ^“A!¡¶Å;‹m…Å0§\\5é\"uj-ù¾Gƒ[I„~È6º:Z–·VÈ®/‚ñOÛP)*…@ŒAÂ·npæçkKac´Ê0”-á#çòê’u<Wq+HGq•ûÖ”•¥Ù;f}I•3ºLZ;>¤\rğ%œ5IOÄBÄ¥“µIO&Å×iİ¶â[E[?E^PŠü÷¬âi”Ä„»£ÌºİT;RUÊ¯D«6Dìí•0&\$š\nÔú(›É†O)5ğ4pi/é\$xYF„R\rÌO¢©0\n³8~“y%mó\0ZtÁ¹ÁÎ&­U'iuU–YøUˆæUM‰”vwil°‹";break;case"fi":$g="O6N†³x€ìa9L#ğP”\\33`¢¡¤Êd7œÎ†ó€ÊiƒÍ&Hé°Ã\$:GNaØÊl4›eğp(¦u:œ&è”²`t:DH´b4o‚Aùà”æBšÅbñ˜Üv?Kš…€¡€Äd3\rFÃqÀät<š\rL5 *Xk:œ§+dìÊnd“©°êj0ÍI§ZA¬Âa\r';e²ó K­jI©Nw}“G¤ø\r,Òk2h«©ØÓ@Æ©(vÃ¥²†a¾p1IõÜİˆ*mMÛqzaÇM¸C^ÂmÅÊv†Èî;¾˜cšã„å‡ƒòù¦èğP‘F±¸´ÀK¶u¶Ò¡ÔÜt2Â£sÍ1ÈĞe¨Å£xo}Zö:Œ©êL9Œ-»fôS\\5\réJv)ÁjL0M°ê5nKf©(ÈÚ–3ˆÂ9ÀŒæâ0`İ¼ïKPR2iâĞ<\r8'©å\n\r+Ò9·á\0ÂÏ±vÔ§Nâğ+Dè #Œ£zd:'L@¬4¾Ã*fÅ A\0×,0\rrä¨°jj\"Œ8ŞE°L_¦#Jl–Dp+Ç06 ê		cdÈæ<µÒøå0¨.âîÄ\n£¬2¡¿P25ã°ê„´¢SK1Xòæ1Èø¡pHÔÁŒø0Œ SÏËéc”&B;à€B”(Ü\$IİŒ•h¬–4îªl\n¤ä&-¼ŞÇ#KîÄ5´´:16jÇ¨•š5˜eµ’\r-0Ër5Ãe´ø(È]L[Å Ñp\\VUÍt5WUä KBj7=Sà	¢ht)Š`Pà8Î(\\-Øˆì.V~ê„	CğCRô]p£Mrœ×³iN=75¥µÂBp«wGB˜¦¢d\0 %ñ`Ù*Hº7ŒÃ2`îª\$B‚X—ho<ğ:ÏAúŒÚƒL\n\rªfL2b˜79/sE“C.’Ø7PÔDÇA§KFBR’ò³©Å‚ñjôÎ°Ë´Pzà¿(\r•ŞÅjÉæ²ş£ÚéI¯ì#vÆì­NÑ§¨.FØÓĞO^â¤îís¥;Í(äqÛêy¿ì|*ˆÎÒØr«´@İì#Jj\$£Ot<ƒÏ»ß±œŞŸ¨óîd´70Qà9°\$;3JÄ»µ)\ncÄ¡\0xÊ3¡Ğ ˜t…ã¿Ô\$ı\"æMc8^»şcÃà7C*`^)Áğ¨ƒM	)€¼0ƒæbR˜oM\$H»”0Êh´QêA‡bØ†°\nw\n\$”¾‡ÊÂ›4‡LR*(Eé;CÁÌÂ6ÓºÕÎ©<2a°Ğw6{¡Œw./9Drw‰ëY\r'0®P[š‰qĞb\"5& èòg\$µ M;’(lÜ:±Ğ ‚0ìº%¶VL\n\np)z(…“¥ú[\r2\$-„Ô,¾0ÊVt#Å‘D¿bèhAë\$93…¤ƒÈü‘ê6<â~PL•!ä7àìHŠÁ™Pk…v(#¤€“©·D„ur[	€lP‚Ø÷Á”®–RÚJ)… ŒH9âGH ˜¾ÏX u¤(ĞDå‚ñ‹¹5	eÜ by#•±B.äÄ6—Pç5a!t5J|Ó¯ÕÜZ# ì˜„Ir:S‰¨J3„=/¥œzØz=s`((ÊA\0A¸&ãb5b’z!•,ÍV¬0'è\0Â -cS`¶M©z&q¶5Ìh³3çœ¤q˜· ÜƒHg'\$ŠV”B¦Qå5\nÄŠv’s€ä(\\\r\naD&4TÊQÉàF\n@:w`Éô|\$2g­e\0ÒÉy1%ä¤ü\$=O\nì(„îª”â—,İ™µpŠ)ÊÈÎ‰¬«o ó†ğĞš]É oTº¯.w»Â]n®¹)ªÍ]¦H\niP6³nù]…\"S™¬ƒFPÂçƒ(pªÊz¤œ™#¡T*Kpq!Fi\rèÈŸôµ^B˜R–”×GÊÖTM~?ÏX eˆrŒ¢1°»†YrQ	°uÄ3\naÓj\n5Wâ˜t\$NÑA®8n>ÈUzæ\r#6jÑĞÌ#õhá‰¦Î„¼e,5RvU´¥ZDí%aµ@‚ÖÖ,iÍçu¥2ä%y˜œkZNIõ\0ÑÃ^lPÑ´6*æ°­	ö]ƒ“Ñ«ÓÔÔÉ³U]\nB¼€‚!©\"sg\09RR ƒ¤{Oqï>Äù3è}Aİö`ó¸Ÿ€r~OĞ•¢@îšÃ#û§®T¸Ap";break;case"fr":$g="ÃE§1iØŞu9ˆfS‘ĞÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒĞi†DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†LeCˆÈf4†ãÈ(ìi¤‚¥Æ“<B\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠĞxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›‘¬Ã'Œíöz\\Î®îÁ‘Éåk§ÚnñóM<ü®ëµÒ3Œ0¾ŒğÜ3» Pªí›\"L«pó»pİ\0§\0Ä×%\nJRìÌš”Â£ƒ¨à¡­c\\˜©ChŞÚªQF2B°Ê:¨	;V:À2º6ì\$*¥£ÂÈ.Êª*êÊ˜®+Ê+´BĞ0˜es\nŠƒÈà¥FŠæ0 MÀ'\rãhÄÊ£¢\$¸”<ÃD^ÊBü4Ì€P¤Î£êìœÂÉ¬IÃMNÓšË’2É¦È<4dKÁ5ÀQ¨ç3ËÌR£5±\\ş:P.ÚµB¼L\r82ĞTûÂÌÊã’†Â»QdÀ:µ#`@ÉŒ›ì:\"ã @7Œhè„µÕy_#¨8Ò\rÏH…á gf†3Ê›!–£¢Ó%‘]˜eÈ*Jâv–6‘`ƒ^ĞÀP§ZZu;\nèˆnÂ2€P‰\nc¨ÔİB€Òa•Zá,(Æƒ,}‚7IÂ3¥	ìøÉ«ÃvÉ…Öu†Òx‚ìª8™SŠâåHæ(x(Ü0¾â@	¢ht)Š`PÔ5ãhÚ‹c|0‹¬ò¦&\r„/CS+8ı»mJºªWc¨A¦\r:pA¨%ÚºŸT‰\$„«¾h:Ïº-Y•[@4%ÍzøÂ§BšÔËÂ%G·MÀ7LÂ¨²fTÑ#®’+ØvÕ·á“XNºÉ–HxÛ¸c;ŞûoûÏDmœ1Rñ'ÅÖnÔÎÉO)«òĞ~Ä0,ĞÊƒN\0CutÔ4’8N×ºF-P@ƒlóµGRÉoWÈÈ¸dOÓ##ßø%Kª'£C*3¡ĞŞ˜t…ã¿Ô# Úˆ')pÎÔŸ¦¹ ;!xDªÈøà­EJ·5@ğ†|LIèmO±5\0ÂMÊ&FT7\"PªUZ¤4(µ¼SVÕ³FzÄC2tšnÖÛT;\$p†Ôz¢¢jg±€æ	Æi2¤)¼+Ö(jš\$!0(U0Ö†]±%uÀ†ã”ıÚñ™,%X…Ì`‘ÑRkhş( ‚Cä¸:4@\n\n¡4Å|Æ2B‰)É'dö&;äì\rdd6Ë„»Àúgp'+êe©£Böd:	*È<µ0@aI­!n¸È¢G¤¥à¹®zÌT±1@âŒ#É¸D<¨ªFĞo`A\nNÏX@Şå0C\naH#rÊJIÕEÈÀ ¼h(Â)Y%Á´Ïó*ôVJb‡e¢Ì@Úß’y )ç<”™7ªÆ»ƒÒ3À&Ÿ	‚˜ixæ’@ÄW!#%!P ”Y?VÙIÀ„„Üü“ˆ(í´™ÃtjÎ*Û5¬@D1‚€O\naPŸ6úå gU9ŠÉ=0l'¤ş^Å¨ˆ<Ü€F®<ršÑKPrrV’ Òh€%§E1|()ÈmÍJ3á½ö“	!D	K+dÀ)…˜ˆŠèF\n‘„ó5Ô`¶ÑÂÙŒ„ÂyOI,õƒ“t:„î\n˜\0­äs\"ŒG°–1Š¸­´¬\"¦2²4Lc	¥f	•v¯Á¨àëiç‘mí+—]NÕk¯5½A±†5_ëIÚcö±XJâÉ‰ĞC,A°†4'Ş1+±f[ÒƒnàI‹Pdä”¢´SC‘±\ríVµOv©Àd˜*…@ŒAÁ:ah3¡Æ%[¥R!ª.ÃÛÄ¦®ìeÀdw\n¶Ñ2<Ka!gE2 “®†ñh	ôVF*¸(EN­“„6l8û…%è¨ˆ\n±Ë‰¥§­I	B”ÀŠõÀE(MÍ¢1ÇvRbNn,ŠOL@õ†ÆÎ…ƒ%‰)71n¿Xz,)!Ê80ÙELéŸK’qq[¶Şn.#«®¯.Õ\r((`¥&†Ã²ÃÂÚ1ïú©Ìµ–´”5å(Ã›¿v‚f\"0İw¸âPgc/EDÄÓ†0Ç\rd,xBpà–‘Hã¯DÒa=g÷[ß|/Œ:>WÎú_[í}ë¼?'è{Õä¸2?§øÿğ9+\rÁšaŞˆ	p";break;case"gl":$g="E9jÌÊg:œãğP”\\33AADãy¸@ÃTˆó™¤Äl2ˆ\r&ØÙÈèa9\râ1¤Æh2šaBàQ<A'6˜XkY¶x‘ÊÌ’l¾c\nNFÓIĞÒd•Æ1\0”æBšM¨³	”¬İh,Ğ@\nFC1 Ôl7AF#‚º\n7œ4uÖ&e7B\rÆƒŞb7˜f„S%6P\n\$› ×£•ÿÃ]EFS™ÔÙ'¨M\"‘c¦r5z;däjQ…0˜Î‡[©¤õ(°Àp°% Â\n#Ê˜ş	Ë‡)ƒA`çY•‡'7T8N6âBiÉR¹°hGcKÀáz&ğQ\nòrÇ“;ùTç*›uó¼Z•\n9M†=Ó’¨4Êøè‚£‚Kæ9ëÈÈš\nÊX0Ğêä¬\nákğÒ²CI†Y²J¨æ¬¥‰r¸¤*Ä4¬‰ †0¨mø¨4£pê†–Ê{Z‰\\.ê\r/ œÌ\rªR8?i:Â\rË~!;	DŠ\nC*†(ß\$ƒ‘†V·â6¡ÃÒ0Æ\0Q!ÊÉXÊã¨@1¢³*JD7ÈÙDàS¦¯ Sİ\"<‚òô#«èØQÃpÊÙ1â‚”œÒÃ•;¢´»A#\rğªÂI#pèò£ @1-(VÕõ‹8# R¾7A j„€¼°¸ÆÇ¢ª¢\r¦®3\0ôÌjc¾ ŒsTG^\nc*AjÈ«ë*\"§-T˜2B;U<‚È<C5XçCP[+Z·Ø°Ş1 ŞVuuë6\rë\0ÔßT(Â3Ê@P\$Bhš\nb˜2xÚ6…âØÃŒ\"èlÛsR*Ü8wt™(úB«%IMŸ•DÙnb±Dê+B½MÕŞÏ²­nÓO²kãêSR¨2´Ò^Ü Èîˆ\"_èî?Är¦è1}®jŒN¡\$*ıLÀ*µr˜7µX¨':’¡»ÚóZªk:I®n5PÃ°ä‹V›>Ó%éRŒ.°ºlET²0 Uq”h:Ï·Îqcv¸’ÂpªRØÓÎ¯¾Ô·ÚkÆÏTŠêÓ»T{Øã'):…Á\0xÂØÌ„C@è:˜t…ã¿ŒF›:”/#8^Àyğû›\rÁxD«ÂJITkÃxŒ!òT'ÅMV¨f0KÑ	ÓÒ\n’¥¼ZòËrÃ¼U¯£ÈÎ\$éKQC„Ğ*\0@lJq`æ©{¿§Ş‹ÊIUÁ„3SåòÆx\$Îv ›ÀcŞ’SºgkÉ­€š\"Àˆó5s\$Lõ¡“TĞT1zne…\0(o@èÒ‚‚¬ŸŸá*hÀ“²<H‘S¥8À“rV\rAª éhèÜê€á± ‡tµ	›\$HuÄ •<Ÿá)×\rÁÁ´šäƒN4!\r©òÎï•y!„m`0¸xÃ[daL)dş E\nƒ4 €\"¨ÆHJ£~%Hèş72W\nYN&,<:aJòHIOŸ”F±É\"?Se5B;T\"JC2BRTšTLMË¤>Ëä£0#tRJrÖq‰ ªµÔò™rªZå%¥›”œ%i}I’v„ğ¦»mMo 3ƒ¢gªYvFŞMÃ†¬`8u—®\"%™³dC²kT–ƒÑ2œ…B%\rú‡X\0JPÊ)(Åt0¢å<DÜ0“’vJÔ\nd*D¯,I1ulñ™6¢B*ƒléÔä§'¸º	 M\ræ4¢ÒÂCK—«r&†DÉ¦7øÖÕ9]Xš/J^ªà8fTKé~Tj„Õ ¥KmèÉ0†ÀVÔcˆ!Š5QŠDJ_R.9ô‰²Já€q¤…ş„ñM	rúq €*…@ŒAÁ\rUÄ´6RGÎM¯fª×ø½)\"äeÄòBA™\nİ7ìÃ˜L«‚Ç2´ONuT¹Í}MFH%£eOtôPaœ0‡©¦U-5\0005Ï¬6Ó0ÒQN±då Ÿ•(J-a)'Â…6²T–ŒÃ•¬<`((M“~fùAKpÏ*5@öÃ*«¯H¦¾¯Û¸‚š-‘h\r ­å\"•{W¥b‡;5;kd7†ùw…K*oÂ5„]èÌ69D€";break;case"he":$g="×J5Ò\rtè‚×U@ Éºa®•k¥Çà¡(¸ffÁPº‰®œƒª Ğ<=¯RÁ”\rtÛ]S€FÒRdœ~kÉT-tË^q ¦`Òz\0§2nI&”A¨-yZV\r%ÏS ¡`(`1ÆƒQ°Üp9ª'“˜ÜâKµ&cu4ü£ÄQ¸õª š§K*u\rÎ×u—I¯ĞŒ4÷ MHã–©|õ’œBjsŒ¼Â=5–â.ó¤-ËóuF¦}ŠƒD 3‰~G=¬“`1:µFÆ9´kí¨˜)\\÷‰ˆN5ºô½³¤˜Ç%ğ (ªn5›çsp€Êr9ÎBàQÂt0˜Œ'3(€Èo2œÄ£¤dêp8x¾§YÌîñ\"O¤©{Jé!\ryR… îi&›£ˆJ º\nÒ”'*®”Ã*Ê¶¢-Â Ó¯HÚvˆ&j¸\nÔA\n7t®.|—£Ä¢6†'©\\h-,JökÅ(;’†Æ.‹ µ!ÑR„¹¨c‘1)š!+hëàµÈ,Vê%Ñ2Ö§Ô#ÊI4‡'Í\rb†k”Íz{	1†¼–µ“40„£\$„ÆM\n6 A b„£nk TÇl9-ğüäÃ°)šğºò D°šå¦¨ #ëhtª¬I ¤¨dã5óŠá;-rÊ^è¤ü\"	­<„ Õ*TRlw’¨ÚZ/b@	¢ht)Š`P¶<ÛƒÈº£hZ2”F•A(ƒ‹ˆƒHæôj–<Nğİx^O•ëyŒ£Àè2Ã˜Ò7à0(µµkØä:\rŒ{&…(“\"û\\µMpJV„”èÚz½MÔºk%iŞ>Á³©mÖÀéZ[e’¡b¤ÁâLXƒXp|ûbÃ5\n6J1ˆN)zæÌÈL¼Ó§F\\(ÈdƒÇÌ”¡·®BO18Í|¨Ù éÚ¬º	›J!\0Ğ9£0z\r è8aĞ^ûÈ\\0ŒƒhÒ7;ásÄ3…ø`„JX}3¤¬Dè”aà^0‡ÙÂl×ãszè/ùœ¨ÓÀéÀätl5Ò£”ê×dôì†'i~,*\rhÂ1˜º;#`ØOhàïŒÏÚ2ÏÃÍO°Æ1¾#˜Ì:øc`Ş3ïá€:\rÀöİşX@1íƒ&ŞŒ#`ç.ˆ7&k”mr!/~e@(	€@\n\nX)4Ê]‹6àãïˆ7‚\0àƒHvx!”3¼È~’î>a¼ú¾×´Şaäw|öÁ¦ÒÏãÔuñÂ°Ü©û?§ü9'àîHc|-ø3·ˆ{ahc!Ôö &^æÈa!„8æ¥F6I—Xjk,K—bLt	%ä@H©”´•	8F\rd€’õŒ×ÍyjG€¹Ä\nBˆá3&«\$’\"–a’ñ@tQÂ*48Üb](--õ¿ó\$ÃÍ±=%ª}7“´¬ÈNj æ!Ò\"PGH4r\$Ë\$œIvHbUá¡@'…0©á%!Æ\":º#0ZÖ’TÆJM:i]F¹5JdŒÇsœäšoj&uX§s(‚0TÄ˜‰dŞp\nFA)y2˜–0`S¹=O&œÖ:ëRLÛg&	‹NjWšÀæœÄÂÑQ\n:gjâsÌyÔKİrÍ&4”»ÀäğÁZo9¤õ8¥B<KR”ÂhFØ¾±	*––IO‹ˆmÏ³;äºÁÄ3Ğp¯¢Ò[3¬\$š…DZØÁ’4etDrˆ_(Zb—FIĞ%ÉS5•Í01fê2¢Â\\ƒ\nÃZŒ‰i’×fbQã›\$½V¥IZG(iº!ÄxÄDõÕ=•j0FD8ˆUJ`jÄ™†Tdšr’Ú\"ºf1–1“Î-´\$†JÈecFD¼–8Ç«Mx‰.©G¡	.(e+šIÁ&jÚ”İQ=­¢D";break;case"hu":$g="B4†ó˜€Äe7Œ£ğP”\\33\r¬5	ÌŞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dŞu'c-LŞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6şA»•«ÁpØ<W>do6N›è¡ÌÂ\næõº\"a«}Åc1Å=]ÜÎ\n*JÎUn\\tó(;‰1º(6B¨Ü5Ãxî73ãä7I¸ˆß8ãZ’7*”9·c„¥àæ;Áƒ\"nı¿¯ûÌ˜ĞR¥ £XÒ¬L«çŠzdš\rè¬«jèÀ¥mcŞ#%\rTJŸ˜eš^•£€ê·ÈÚˆ¢D<cHÈÎ±º(Ù-âCÿ\$Mğ#Œ©*’Ù;æ9Ê»F¬¶Ğ@ÂŞ qóêFräˆ6HÃÓı\$`P””0ÒK”*ãƒ¢£kèÂCĞ@9\"’™†M\rI\n¯:!£\"š€HKQU%MTT€Sî·À PHÁ iZ† P–¸t}RPCC±Áƒb¤\rË›úpb¬PŠXµµ¢%¶oûø;´€Z6Œ-¨?ÎôSã`ãÈ!»ÈØŸ4uÒØ6”}NÏÛ÷r”\rw˜ÈÖÕ]ñp6¬øÙ~——¦·Î~_Ø\06 –Œ“\$‡C€à\r²˜¶<äÈº\r¡pÈø#“¶6\$²¢‚â6Ñ`A3ãv`Ö©™˜å™£Â²7cHß &âb‚íIKÓ5KZ7ŒÃ2€…0àWM­GÇêåxEÏ¥å¸ã¬0²HR”Û\rRøè¬ê:R”²òCPä¿¼ä`ØCÑ\0åQg£€Ò¤DA\0x˜\n@Ì„C@è:˜t…ã¿4NãjîĞ`Î¡&|„h:^)ğ’6\r¶Ò:xÂfL“4‹·)ÓEí‚5p!Ntl6ìÃ^Ğ„)#,	ç@æÂõ#tV„ë’®ì«MfÀ”G3¨Ü4¸Ïƒ6˜c¦…í¬s»£#Í2UÂ3oğÀÆ1úƒ0êøCxg.àö™£€kNñ’ÄÒC`s&á8»—–À‹ÈÒ2[‡Ö\n>ºX1WX&pÏ¶(Íğor`€(€¡Ñ„:À ¦\"·¦ÉW[C!O¤÷;ÓblÍ©·THi•S„…‰€leÜ¹p¨fÊCÀ ¤Ä9¡×øğAš5¥İ'!Çˆ`!Áa ‰ÎäDa…'¾TÜœ‘Ú2È !…0¤‰€zhdÌ¡f\0K_Êˆò·¸ò™ó(i“‚tO	ñ@2%hÎ¨”¥\n¡	G+.\$'\$P¨Œg3æÂ@t‹	¸I\"!äÓ‚\0È–r!\nˆÍ\"C©…)A™’\0‚h\\û;‹H 1²Ç¦p{18Æ#’,É„,	áL*ğAì%a¬Âàæı”²w<å¤¦Ş°a„ø[-WìÌˆ9ÿ*ÆdîÈÖ™ĞA»e‰Şh†(Ì˜Q	„Ê Îˆ0T…á…d¼`†Ş»— éµt#§1(SÂÙLÆ\$NhÊ9—…^™–\$Îi	èQ&6t“uïJaw+.M€Òõ?F©‰Î)(ÕSL©Ù7aĞù‚¹ŠCĞhsFt†ÉrïX¤¯Áæˆ“pA^@s)MŞ…P¨h8f¡Œ‹ê\\¨ˆ³;'±½†ÊZÀ«M­‡ş·¯zãZĞİto„x\"HHrq'ëlí¾9¢^ËêV<–©€¢ó6æê\\\nJ0P†0Ò¢˜r0ˆÌı-µ½&™³pl‚œÒİy‹\"¥(­ƒÉ&Š¼Ğ\"bÌ’RRö¯E\nÂM7ÏÆ)SÁß	–öW†ãŞv\rê\0«¹^¨Q†%ƒ™Ó ¦€Ñ¢%rÎá;õÙW»wY–}%É]afCÒ°:úæ’ªºW‡Œ˜Ø…Ö0n>P¾ğ¦ƒxk@";break;case"id":$g="A7\"É„Öi7ÁBQpÌÌ 9‚Š†˜¬A8N‚i”Üg:ÇÌæ@€Äe9Ì'1p(„e9˜NRiD¨ç0Çâæ“Iê*70#d@%9¥²ùL¬@tŠA¨P)l´`1ÆƒQ°Üp9Íç3||+6bUµt0ÉÍ’Òœ†¡f)šNf“…×©ÀÌS+Ô´²o:ˆ\r±”@n7ˆ#IØÒl2™æü‰Ôá:c†‹Õ>ã˜ºM±“p*ó«œÅö4Sq¨ë›7hAŸ]ªÖl¨7»İ÷c'Êöû£»½'¬D…\$•óHò4äU7òz äo9KH‘«Œ¯d7æò³xáèÆNg3¿ È–ºC“¦\$sºáŒ**J˜ŒHÊ5mÜ½¨éb\\š©Ïª’­Ë èÊ,ÂR<ÒğÏ¹¨\0Î•\"IÌO¸A\0îƒA©rÂBS»Â8Ê7£°úÔ ÂÚ À&#BZ\"ŒƒHèôB„M9È\nÔ&¥c¨ÖKª-CjrB(İ!\$Éê…Œ‰4œæ)€ÈA b„œğBq&£‰Êê5¢¨äÛ¯Îºàˆ¢h(²ãHĞ×£Ê6O[)£ ëL	ƒV4ÀMh—R5Sb!JÒé äÅ¯cbvƒ²ƒjZñº\"@t&‰¡Ğ¦)BØóa\"èZ6¡hÈ2RJJĞ9¢\"ôÓ±Ê@@ôõ©\nÚé¬2’ö²ÂÏXÌ¸@PÙL;™1ÃxÌ3-#pÊº%mÒ%ÒãªdBõzVË„]ú™_£1/Ab ËÀô¼(£8Ò–Ë­\nfı?õ²< Êÿ„â4RÃ0z\r è8aĞ^ù¨\\¡¨BP=8^g÷\n=qÁxD¤ÂKVÌ7# xŒ!õ¹ |Û'Ğ80A'2IDÅ{LïT´¤n`4±SRo\r#2Z*\rpÂ1ª,dËÖI>º9ÏB;6Œ7:QUŒc`9ŒÔş(7âÊï'\$­˜£¡\0ÇKˆò¡ÂÂ,!qm:¤·L¼ş‡´\n@ œ'Rm<å'AB©ëc–ˆk-íº7¬ã\$Ê2ÌÃ56¾ãè›´¯š„6\rƒxï‘íû-­íh‚3Ãkj%ìºÊWShîÒi.r3å©¢Ÿ¸òÃ«{¢C~ ˆb˜¤#v²BH=jú.\rõ0©õH]éF31g‡PÚ‚‡)É‰¨ë9;'¤üœ¿Ä€Ğ0i\re\n’Ğ’CÃÉˆ'iµå2<ÕÍ!7RÁÄ:“68m23•ìLÜ‘Ao6>´HLÑê=€€(ğ¦\ny((¡°Ä’rbz_ê•EÍ¡h\"àbSV&DíK² CËnÁ¤ \$(R4*fÄÏ<Ò†P“t\naD&@3.cŒ±ÁQÕ“”ÚpÃ[†ğäˆ/–v™S9”UÊÁ‚\$Óuì‘m\"J+\$›SS’		kIÆ'‹Ô©8Á¸–‚TÚæ¤“D¨ñC¤¤ú‡Ã`+ˆa¤1‘fì@Ã²	†®ø6µfÚdQ-ÑüR6Şˆ@ \n¡P#Ğp¶Cpc˜Ä~V¦Óe	¼¦V0hÕ‚ZâB0#¬ågbä—&0f (Ü©RB‚’—``(ú¦s vĞ4\$2j¢ª¹ü\n	vKDqSICsm\"QÀßæ+ÓZ\0*‹3 tŠ+_LhƒEÒ×ìµm*ÅUMòôk”¸enŒŒN…_œğsx )¥S´ı\$¢éDTS¹K¢ÙŞuç\0\n";break;case"it":$g="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†[p’š&‘Pá;PmB†@a3Ú­Ã”„âu¨Ü„+¡°Ùí§köÈÙ´¨rC¥¬ëµÙÌ\$6³Ó„bsæÃ¤cÁ¹hfÀ¢)²ek¿-f}ø(ªs¿NPM,3w#ÂlÔ¨É‡Y:Èä¸ƒÂÑª8Ng{A’Zï¦J`5ÉRŠ¦©#(£)*Z‚¨*J @µeZ)¹®ØĞ2B Ò82ˆÒ<7%q\nÚ6ïR*ª-ãª(ˆB#ÜáBü!;€¤2Å‚8Ê7¢Êü!´¨ĞÜ=\r+k(ù\r£¬%¢*ô‹Nò¨‹C‚ƒôşC  ÅH²%\$&épŞµ\$¬èäœÑ\\8',ƒ²0Œ©šÌŒ\0Ä<ª€Lñ=OŠˆšI¡xHÑAŠÁ/«:Æ74ğàŸ.»	s¯3\$ÚØÎ”óÂ§(üb¿	íx³0+Ş¯ãs2¿Oã-HÉ£‹]f¹Óôó[TµÍe\$ª‰hÂ'cx\$	Ğš&‡B˜¦ƒ ^6¡x¶<ÛƒÈº\nÎ;~ëCÔ÷0¢#¹£éZ`£F¬øÅvµW€Şú i\rá¦‰´H–»Jœ8æJ¢˜Ë¸ï<ÛdÂììÁ:Œ\$:‚>¬¤®¹7¬Ë*7Ã“Ô:,‰ªb\r“:Ö!Œ³JÆäh‹.7¶*Ö¢Ï#k|–\"¦)5q]Ñ-xî?á&L7e.2å‹Ó—æ.K?æÃsÔ4¿ì#T2ŒÃ5VßµO::Œc7á©İü¥6;Ô0åÂŞ¯£–E§jÙ†Ğ—&Êw.O,ºÖ•?*i†T¼Ûux‰€ĞÒŒÁèD4ƒ à9‡Ax^;óuª°ArĞ3…éX^2¼7áŒ	#hàNÈ€Êã|¢mÔ€œG‹Ê15\$Èª495ìã6MØØÃßÑË9\$pƒŠòİ¶0ªïŒı<áï†PÂ`ëw#7º0åd³D›%ˆÆÄ¦àIÚB1È¨¬‘%J8ú‚Šri4§1bv€‰òB©è‚\0 ƒc>§Ü÷PQI1gÙ/2ìK‚¾\rÌ-Õ’ú}É‚3\$€µAX;ÊMfØT\"HLIƒa…2\"êßOĞopmë¾€Æ†Ìáe4¡ˆº=cH^I}%À*ğÖEA\0C\naH#Bôœ_ˆ.í]\$–HLŒG\r&¦*3³(_]“XÆx3äös><¨1PBó\$e#)î.!Ö3˜¸Õ\rXr\"d¬„Èè‘œ,‘¼4êñâ„@Mµ{³ÀÈºlf\n<)…HÄ£fG´Ş¯äíO+É/F•Ê†“pÓ9;’)ï»ÂZ\$™º\"Hòœ Ï\"ƒq(4)…™\"dZÁR†TòL‘\0r.O ŒIò8õß\nQvˆ­9f« §uœ†|é9Ğu'\rëÀâbX_Èáƒ§2AB(nÆÙ¡P,àöO©øEçñÇBLÍZĞ6°‚1“‹'46°Æuƒklg\$’¤âÑ\nLğm/%îb2T2É	aæ}ğ¿zF_	€U\nƒ‚ZŸËI0›Q^+ãâE;›PU†’	zI¬‡ğ¼“µ¢ü^Õ0ZŒ%ã&àÍz0´Š¨‘#¼x©:ÁºUÊH_a ¬ÔÀò©R¦F(ñ¥%¤>4·ĞÒ0ÅÔ¬0µĞ‰'e”–¤Ø\nŸfôœ«¨AYˆ ë*œÀÃO‹JTH\"ÉKc>Õ¿»((£Ã•hM°*¥ T:\\áıW1–Hê—4l";break;case"ja":$g="åW'İ\nc—ƒ/ É˜2-Ş¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ĞT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Ş 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼ş†¦s­“=”×O¡\\‡£İõë• ït\\‹…måŠt¦T™¥BĞªOsW«÷:QP\n£pÖ×ãp@2CŞ99‚#‚äŒ#›X2\ríËZ7\0æß\\28B#˜ïŒbB ÄÒ>Âh1\\se	Ê^§1ReêLr?h1Fë ÄzP ÈñB*š¨*Ê;@‘‡1.”%[¢¯,;L§¤±­’ç)Kª…2şAÉ‚\0MåñRr“ÄZzJ–zK”§12Ç#„‚®ÄeR¨›iYD#…|Î­N(Ù\\#åR8ĞèáU8NOYs±ùI%Èù`«–trÀAèü~Aó,Î[¤ª(ùsD¯äª%äG'u)ÌXáÎMEª9^×êEJt”)ÎM•ÑtxNÄA ‰ú«‘ÙEH÷“dÜ! bØ§¥!8s–…š]—g1GÑÑÑ˜ĞëÉ[^„\"òE’¶¸t%ÁÌE?4rU¯%¹\\råÑÈ]/J	XÖg1n]œ…Ù0IŠ2‘Š\$ç6å¼AÒ˜”Ie¹y~ËMzˆœäy},EÒ”ó=§³Øu1ÁÒ0cÎ¤<‹¡pÚ6…Ã ÈªU7ú?Vˆ3’ÛI!ÛX¨ìÃ–Ê2Ü9#~çP5²9pƒ äÒ4Á\0Â95ƒxÌ3\rƒHÜ2ÄÊ]smÙuPÌØ\ryÉIIÊÜ(ùv•#åº8¡–z)8O¾\$„ÅTH+È×Õ\"Ãi–±32\"26&Â.İqI€ÓÂD¡\0x0µ Ì„C@è:˜t…ã¿¼# ÛÅAt3…ã(İôî?Vé»á¢	#hàÛ\r¿Pèã|Ù_ÉÄ\rëtŞ\0ÚCY¬\r(}@wƒ£sêĞº28éD’'Â\$ó+u”Ï]Ãºwø@ĞkcÕsj\0b5ÁdşVèaÏ	\rPÆÍÈsÁÖÀŞÜP …ÇİÂt4_È o1ıÂ™ÌFÉ#dp’3Æ€²bx@Ph¨Å£Tn:ÉD‡“8Â  š†QeĞ2Ä“#¸Y1”Ñ„6ìâáSŠæì×›fmM¸e[¨t9CtqºŠñ;É#™	D\n7O@9¢€\"IÄA¸8T>ˆQr[¡Üâ†0ÑƒHgzĞÄáÄàÆCª9ŠiN)áTÂ˜RÍíEÁs ‡(†¬å˜;hBÒ*'/\"¹6&áÊ#Å|pŒ¨Ÿ„ÊS&C™:aĞ-ˆgÅˆOÌöØI‡(¢!	d–)®îæÊG™à(\$‘`òàC i[¦¹¡ İ)ºpÄ:›”2Pmñ>Fİ*0cˆÈJ&É„@n`P	áL*ÆºLUaƒ(\$Ô@“qCKs>—&q~GÊbNBê|t‘ÑH´@ˆ¶Ê:@­MsâsÓTƒ5ª½\0w³hÒšy~ôF|.\nË@ÂˆLšHhô0T\n\n‡Ê‡ì‡¥E£(i´ÂÖŠÓZ°dróâHÙéd–i-BL9„Ø´ÂYQØ—lDJŠĞ±¶\rc0í¬Q³vÇÙ'eK¡\$D!·àØ\néia­³ g ¢½‘†ÌkÉÌÕ´6Ì3¥B\n¡P#ĞpÚ½\rÁœæUºfÉ3²bu\\Ï+SeËê¹0%b°ÆÄ	¡611˜é¢õ:ÂÄÌÓPt‰aDsŒpç2HÊ)iœ ”T¿FDÉ²>œåêƒ'Ü—ˆ~:ñ1ÁÆhU`Ü„H0¿=g´\"¦¼£Éé?âÔÇ¡QˆÄ€æÂq™¶ÃXxÂáÎà\"×–\n¦#ø[İ»º£–q»˜áÎªŠ}c×’ôJ•)9Âı/3s°X\0 ";break;case"ka":$g="áA§ 	n\0“€%`	ˆj‚„¢á™˜@s@ô1ˆ#Š		€(¡0¸‚\0—ÉT0¤¶Vƒš åÈ4´Ğ]AÆäÒÈıC%ƒPĞjXÎPƒ¤Éä\n9´†=A§`³h€Js!Oã”éÌÂ­AG¤	‰,I#¦Í 	itA¨gâ\0PÀb2£a¸às@U\\)ó›]'V@ôh]ñ'¬IÕ¹.%®ªÚ³˜©:BÄƒÍÎ èUM@TØëzøÆ•¥duS­*w¥ÓÉÓyØƒyOµÓd©(æâOÆNoê<©h×t¦2>\\r˜ƒÖ¥ôú™Ï;‹7HP<6Ñ%„I¸m£s£wi\\Î:®äì¿\r£Pÿ½®3ZH>Úòó¾Š{ªA¶É:œ¨½P\"9 jtÍ>°Ë±M²s¨»<Ü.ÎšJõlóâ»*-;.«£JØÒAJKŒ· èáZÿ§mÎO1K²ÖÓ¿ê¢2mÛp²¤©ÊvK…²^ŞÉ(Ó³.ÎÓä¯´êO!Fä®L¦ä¢Úª¬R¦´íkÿºj“AŠŠ«/9+Êe¿ó|Ï#Êw/\nâ“°Kå+·Ê!LÊÉn=,ÔJ\0ïÍ­u4A¿‰Ìğİ¥N:<ôÇYİ.Ò\n‘JÇMœxİ¯šÎ““‰,‰H«0é0ÓĞñê”ïÔµm(¨VË/VÔıwYÈÖ<X§5©QU:‰Kÿ=@k;ãYÄOd@¥GuòKÜMÌ¬¢C\"K©õ-?4] ¡pHßAŠ€ÿV—M¯'À6ÍÅ¥³Yø¿’%E#–²PÀ6º±IÁµ?;ÓmšrøËÖ½ÀÿÄù4\$ªì§T¹ob´!Ò€³'0£f[å‚»º×4´¥HTB,Ô¢”Ö¹ÚÓ‰èÉ>˜„·r\0İJO²àÁ–³—‡Z¹¯*†R·°7[Hº dmŞK¢©TÊêğç…W-¬¶ÿîªşñ»?I<ÄªË“¢Ó©Õ86ƒ–Ù„éÚ‰j¨‰>ê5¹…M¦µ|¯uÎM”¥Zí¯€*\\«ÙwäŠ©_ Eoş)nõ;_^àî5¹Ö¹öYê­¢åŒZd	z½©Uyé³FÒB9=Ğn>¢röÇRæª%¾ösíßü¶k³¾¤úøGQ˜W¨7N»~p=S(A•³Ÿˆ·ºu´îœxå<Ó/ò‰\0^{ÈWI ô°C‘\$ç\\Ö‘å¾Êàa 9PÌAhĞ80tÁxw…@¸0†@ÚCpe@¸7‡ ÎÃ(n‡à:CæC|:E|A'Ê“±»àğ†|íË*•>%°¯¿BªåQÔvç\\ø”’=_«Õ\$è¼—šuĞqË1×-d”ë›…¾IHòMeiıñ9äì¥_9ÿy,ñG­ÒrS‰ÜjXL†89¾Mº£wK-\0§×²†ÊªÜ{ˆA+v^¥`A™s¥>-75· Ø›Ò)N4)YªYqÇIEÂÕb¯øƒGæîF¸Œv›…}PDßH’ˆÀñÎ\0 ¯‚“N®àDC¤å†§¹(C`\\\0å™\\Stkc#—’Äëš—Ck‡(K!ÔlÂ BhQÍMó/£ô¿™lVV'æ:ÁÍÄs!J—ƒï6“‚%ˆå-,%Â˜RÉTA¹¥è‡Ş#)“Üåé™\$õJoæhKsù&iÎ4ñx€1†¨ó“ìÛF©¦g©âK7çùÓ¢´‚=ªhTÍ	%7ñJ\$¨!!<% 'qí¾‡3Oåô	z¥Ù§ÇÒÌwæûy©BtFšÜ)MLo( Âèa¨e6óÂXœgäß'ª”†á×«ÃLOÂ€O\naRB~±©¢„AN¡_ÕX•;Å%(¤×§îòš2£—“V[Ô)@Ÿ«s®¦á•I9a§ÑX±SEY¤¥I3£åbš©±X\n\$Ğôm‚)RÌ£æ›¨F\nB†)•/aIbJ0¦vø¥^Ë8 \nî¼/(èÕ^±¡‚€ØÒ9IÕ4ÖinÑÓFkœº¥¢Xºïì×A{šmîzë\rù½ªÛw¤ñ»#Æ±ş%÷™ÏmĞH'Œÿ˜ù6å\rÛaq…÷™(’”\r€­Hsùk{aÔY«”	H™#béñ!Ü õè]¢ ^œ*…J\r<±¸Sî‰ĞÛVÔiÑDa¦œÏij÷«ñD²˜•nXiy7Ë{©…â&”*nïa®ZëÒ˜¼‰úö(¥a*Ÿw,V\$pÈá;yózjj¶RôÍiÙro?ïĞ“¿ŠV8ßû\nL•-ƒ	€\"Ì‚µ†»¤gşãc*ïeŠU˜¦qÖå*”Ûóá7#ÔmŒº<p°”ùxxbu­œ|ÔìMİ»2¸¢å7>ÛIÎj(Jå{¹9S—¯\"ˆñí¯Xø·JäUº™fi2o5eêæô±–#†d";break;case"ko":$g="ìE©©dHÚ•L@¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJĞĞøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØVAá*zc±*ŠD‘ú°0Œ†cA¨Øn8‚k”#±-^O\"\$ÈÀS±6u¬×\$-ahë\\%+S«LúAv£—Å:G\n‚^×Ğ²(&MØ—Ä-VÌ*v¶íÆÖ²\$ì«O-F¬+NÔRâ6u-‘tæ›Q•µåğª}KËæ§”¶'RÏ€³¾¡‘°lÖq#Ô¨ô9İN°‚ƒÓ¤#Ëd£©`€Ì'cI¸ÏŸV»	Ì*[6¿³åaØM Pª7\rcpŞ;Á\0Ê9Cxä ˆƒè0ŒCæ2„ Ş2a:˜ê8”H8CC˜ï	ŒÁ2J¹ÊœBv„ŠhLdxR—ˆñ@‹\0ü‘n)0 *ê#L×eyp0.CXu•ŒÙ<H4å¤\r\rA\0è<\nDjù ÂÉ/qÖ«Å<ŞuˆzÃ8jrL R X,SÜú¯Ç…Qvu’	š\\…–ìÙ:Å½'Y(J¤!a\0ÀeLÔÙÓšøu½çYdD¤ÃETjMH	ÔZÀEv…åó%õMÅ åiÖU/1NF&%\$şŒŒ1`ÚåO:PP!hHÚÁ¬üY9¤½EBbP9d©ÖP[ŠJ—³b‚0¤!@vdêôT¶…âôY±ä¦vHgY<Â?I…€Â–Wl¦\$jÅôÄß¥¥Œu|IÍ«Í~dÕ2ÒeJ¾¬ôÚXMèPtu–Ä t¤\"Øó™\"èZ6¡hÈ2/MËwKr=y^„ìŒEÉT˜\"\r#œ06CŠ A	AÃvŸ¨Ä:¦¤2 Ê7cHß°(5ùR—^Ã`è90²YÚJ‡Z³G´M[”v‰e9×5Q*¾“d½o¬ŞşÃiN†Xº¥ª§®L™¼3d*×XV!GbI/ÈnÊÌ€¡UÅ]èúIÙ%¨\"l5¯L1`çFpğ8\r#Ë„àÂ\rĞÌ„C@è:˜t…ã¿œ# ÚúÁát\$3…úÿ³®ëûÆ„J |\$£† 6ëã xŒ!ôl} Ğ7Ù# ßø#\\84ÅpxÚCsé(.Pv9b<Y2\\cL\"\n’W„ª¶XdÑ³²‚B!Œ:6\$ÃHl\r€€1!ÄÊƒ2}\$0†g`‰C¨ch€9†`ëÃ`oçÔBä˜ Ê%/ 7tHi!°9£\$ht1©r&°(€ A‘™ÎPšdê;Ê<s¥ø­•óYñgJÇ(!¶8¨gLOÜ8 Ò}€gw`‡ èˆZj\"\rè’%Ãîîà¼w@‚@»ğæ‹!œŒA¯Éı†ààQZ-EáÉd‡pĞCh~¤3¼hH‡\$¤E!Õ\rÀ1<¡T:‰)… ŒA„2ó&èOØ,èÅ#¥bô¯\n2PÒS«rb`@{„\0ëGLJ“2R˜c&3Xœ4‚Ì¨¼qñ­Ñ@PJALŞ<Â)\nd2LÊ(!\$‡ŞPèiY(µ÷ë'Ñº!Õ\"@Ì„Ch /Iê&(ƒC9Cq@¢ÈôPB€O\naPó3ã\\¥E„Ğ<ÂµŠÃ^ Eë¡ÔtİQõ,SJyQHà¾šáÔ,E‚='-I¼L˜â¦”íî©Ö)v˜Q	„¡·2˜‚ PC´C8âiÅa+%¤¾m¤a/V[Ãz/¢].7™{ÏÑ›€œ%GA‰•WËÅ0ò~ç rFb¹6g{…‰\0^bZ·×²2ˆUí~f€ÑW˜¦r˜£&•ÍM1«`¬u*A\rµ†ÀWDe\0kjh5ß‡h—A#›ğ~¤3™\nF„(p6ÊÄI	d \n¡P#ĞpÕC«>ÅÈ‹f@ÄM­‰“%^a°1ÆÎº´EêoÉ¹G8÷A»“ƒô Ä¹ùğuA\0uSy™3fu8Vq%]nôÌ,KœR±RkÎéXBv”êfÔË©™5uˆÑ(°„q&)˜–¬Ú^Ë&ˆ¥bG‡4\"°:83ÆeË§à:Å<gš\"o«õÄ\$Î\0²¤\"Í}\\[¼Âó^ª T/±jÁKĞ‚1ìs,y¡ZHòKX÷HÙÍ©c?*D1n­üˆ”‰¤[à";break;case"lv":$g="V0šDC¨€Êsˆ‘°Òe1šMĞ³¡Ì~\n‹†faÌN2šOFC)ÚsCÍ³#&t &È)Ôõ2œÓ“¸F™˜DÓ	®m…› 2‰!&r”8	A\0”æBŸP\r&ÉA¸Êe£NgItø@\nFC1 Ôl7AGC©­Š¡ÎF–\"%I7C,õ.Œ'aĞÂb:Í'Å#)’ø£—D™,<èoÍ±bÙ¸ÈuŸ¦ÚîŒá2šŒ2ŠQ‹@ »›ñ¸ü S0™ö±Mÿ†˜MØÓ©Ë_äi2¹|Ï…Š9Rœé—?0èÌ&Ó[w0âDL:NÆ\n€\ræC(™ĞGÌ§«úˆ\rf!xb•o¢|Á0Œ0ÊÄŒ¬Ä0«Œp@8#Ş‡'ÂHô¢\"CxÔÏ@	b\n77P à¥.ïëT6¡ãjª9«)šP°!Êø\r#Ö¯#Ï»¼Ğ!mS4µíûÄ4¬…àÒõ°mZPí©CJŒOêö2B¡ˆUjàbC(Ş6»ËÛdıBƒ’B=6ÂÈ@¶AL†‰@ì€Âp¬.2²lªŠÏª´İ £Â„ô6Kã<# Æœ³(zP¢\rÒX”0¹Jbx£\"¨ÀÈAò@æ„´ıB:\r5%L€Õ\0P”…£ép¡pHÖÁˆ&¬	Y&ô=CPÊ1\rnj93Õ€–…Lı€ú¾ñe:ÁL)W³cÒLI×ÕB°¢Æ	Ï,´I¨€P •JM\\–)À‹!VĞãã-¢ª­>2ÜH¨\\Ü·µç| U*\r~7ş{Şx-÷„'ÌpÎ0Œ€P\$Bhš\nb˜2pÚ6…ÂØÏ“Œâí³mÛ´@ú.Œ\nÄÇÑx@½ ÌPÅšªÙ¸å›£Àè2È@ß¢§Î\0ä¢¬rXØ:Ut	¬uö9¶jZÈIé)Êv½£ĞÕu»É\nìP½):†—/±SV‚r=ó4„pÊÉj\\3¢QIŒwÒ†‰^(=ÿ²hr•µ)Ûk¡î’QºnÛÆôIï”«½	¥Ü\r\r×½ÑÃ³Û7@Ò{bıÇíèï%<çü«Q¼ï{ï7¿óÔÿAÑdš‘W;lÃšUï‰Hô3È.ÌH¬ZÚ‰7è8ÒÙ6ˆ\nŒ”çãB2?ˆ8Y	ÒJ.]å¶NR…ùÈZ|&¶zäÍ3ÛÑ¤ƒ”·‰…Á\0x¡\rPÌAhĞ80tÁxw@¹Š:r‹Ğgí	´&ˆÑƒp/EXÚ‰Ã*d\rÍmàxÃ>(hüË\"÷¾”SÉô~Ï‚›—`wYc ©Ï™fºBBŒñ‚\0ÔBÃñ;Í_sïV¢ÖAé\rë¡G´bqBw½H<Cfø+Šm@”>‚\\R	>4F1\"BÛ—I Ä=¢‚\0 ‰7Q	¯€Ã	Qtm(¥Ö\"ÈBAV/Î6dk	ód61h½Ç2_TŒ‡éo\"ãcS:H¨tÖ£?0qç—¾x“²3\$\$¯6êCÏj2±t3’€†ÂF7ù´€@ÂØk›Åè6VX²!MD‰„œPææ¢r“i¦4%ª]\\Š¬(D==¡Š/òN*Ê»b`U‰ò—AŒ	yDs£\rzü‡)mÈG @C\$O|Ç)ò¶‰Ë~Y±&êÃ9¾\n<)…HWH<`ìU¢²PC€jLnM\nËvîìÔlôDÃˆH)ÿŸ4lÙÏÇZ€D\n\0háš,,aD^¢/'Ä¥“TKÍ&&€€)…˜LI™5&áÍ¯Ã´rè))ƒòr¤™ô2¦×/DºÀ¾LåD•”Î4µ8@•E!ñÍª„2†È	^d¡ƒNF˜¿€JC•éT8*ı[×ı‚¯,ÃVyªÁM±kÎgåš–Ìƒß²PŒİ6 \0+BmŞŒ¥ØÄ1¼Õ+E)OijL¨TÀ´S¢Z\$ÑYãC5nË’ò„Á*°6ñ­˜êø§î	³±7ÌÅû€D£Ğ\n†ğ¥HÈÁ\$×MŠ/ëÍ•²ÆÑH\n2„®Ÿ½3f“Q–“½lØ5ğœ¬²ò2	Ê’×ñIZÂH @ŠíX@EWï%·&=˜VÂİÉbX²P7ûo=‘Às%	¨=Ş§ny¦*¨Ò]g‡.ued¹–¥€–|ˆì¥M¬ÖÃqò¼Kµvêt³u¨RÃÄz€P\$\"%×HOh›¿Şûûô2¿ø\0à,0.‘(`œ\\AÌ;— É âwG\$,5’İ2Ã”h¨|»’é	áH.";break;case"lt":$g="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€İ8YÆ›œË/:E§İÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPVãuµâo¢êü^<k49`¢Ÿ\$Üg,—#H(—,1XIÛ3&ğU7òçsp€Êr9Xä„C	ÓX 2¯k>Ë6ÈcF8,c @ˆc˜î±Œ‰#Ö:½®ÃLÍ®.X@º”0XØ¶#£rêY§#šzŸ¥ê\"Œá©*ZH*©Cü†ŠÃäĞ´#RìÓ(‹Ê)h\"¼°<¯ãı\r·ãb	 ¡¢ ì2C+ü³¦Ï\nÎ5ÉHh2ãl¤²)ht¤2¦Ë:Í¬‰HÔ:»éRd¤ËÃpóKÊö5´+\"\\F±»l¥-Bœ”8?Æ)|7¦¨h¡43[¾¿Š\nB;%ÓDËG,ÉZ	©i{0«‹PJ2K² 5J‚è%SRTÃ¢ì,øËA b„x¹£*¸Š¯ìØæ:Sª4¯Ï(˜•Tñ¤È”S@P‚:<sÃÊ\"tP1š¤ÚË“íàU4¸ñüFá¼®uß§5\$•Ipy.×…ê· –	}_…›†0ß÷½†ÆKÛÓd‰@t&‰¡Ğ¦)BØó\"èZ6¡hÈ2ZÖÄ®â“‚ã*ˆ‰³X¸D¡Æû-\rk*fMşp2˜Ü”ùúH)¹lZ#–KÈÆÌ¨Ş3ÃbÎ2èo¼Ÿ4ä³TØ3¯àP”b•i{û­;ñ*7)(b2£|è)³ônÜUº’”•(ZÊ¶%6õ×²BÌ¬8Ë6cRF’ÒO½¿Áã•I\ròõo˜@ĞãÁèD4ƒ à9‡Ax^;ôpÂ2\rº˜ä,c8^¸õùêã \rÁxDÂHÚ8.ˆèã}˜ËÍEÓ¢ÉZ5\rÁCƒî•¨K–«5Ghî54ÓOd#ÃÀâ#Äg¨Â1£º@;³ƒeJÊùÃÌ±ËÕ Â3.mı1Œløæƒ«î\$E˜ú¾ÃPiß))x3Œ‰%‰ĞÃ–Öï\0i\r!¼µÁc,™2èl®-÷®—QØP	AA”DÁA:\$!´„ú3ÈRÆlÎ—¤‚Iyª2è(– îäÏå8Èm±Â\"ÿPÙõ57\0êóJB¬Ô†0ĞHgs¾PÆlÃ›TLEÍ2öòÂ˜RÏ „La\rÄÍÀ¶¥úq˜rm¤½”¥ÖW!° H(Üå’@¬oŒ\"ôyD¤•’Ò^\\HdPÅ€6£´XsRGga“füéäÊW;,İ:’L€ &ª’!Ââ©\rAª8ÁÄ:™ôÈmÔ:¨Ê}C\"0 Õ<IƒŠ/fĞ\0Â¤²eA¸Æ‚\0¦I\\›>2®mHi¸‰% k#\0•¿,åQ¦\"¡¸3VÀ@Ãr(\$¸ÿG²†‰Ñ–1œúš2Déçb¥,³x(„Â>g©›a*BÈô©	RFï0Ìlš¹\$0- •ÆL\\Š\"0K¼‘4QéI€¥j„9³…ÖCã]D20r^ª”ı4_JF—¯ê€u)`i¨tò˜SõIPLawA\rlÀW2CHc\rlÈú°€ìK%ì:m¤Ô3—˜Oh„`Ÿ‘³‚\0ª0-Ğ1¨„ÌI*=\$:dhÅ^tÚ1#ğ¯ªò¸İƒ#gù	R0ôë?«dâäFÛá%®Õ”N|[Rn4õ|9\$êJâDP<¾,ÒXËa{u'ã—Óym	\\\r§Â!@ßmb­3m´Ë“ò\$h\n	¾„6Ø–iK\rË•}uå•Pe8D)VG›\"^qƒÔŸªŠ§ÔŠi_ê‚®°åqY·àúÑæ\$M ÷RQF—º¿¨\$¬!B±ô…N(îË4>%ãMÊ‚6atÒ:’€";break;case"ms":$g="A7\"„æt4ÁBQpÌÌ 9‚‰§S	Ğ@n0šMb4dØ 3˜d&Áp(§=G#Âi„Ös4›N¦ÑäÂn3ˆ†“–0r5ÍÄ°Âh	Nd))WFÎçSQÔÉ%†Ìh5\rÇQ¬Şs7ÎPca¤T4Ñ fª\$RH\n*˜¨ñ(1Ô×A7[î0!èäi9É`J„ºXe6œ¦é±¤@k2â!Ó)ÜÃBÉ/ØùÆBk4›²×C%ØA©4ÉJs.g‘¡@Ñ	´Å“œoF‰6ÓsB–œïØ”èe9NyCJ|yã`J#h(…GƒuHù>©TÜk7Îû¾ÈŞr’‘\"¦ÑÌË:7™Nqs|[”8z,‚c˜î÷ªî*Œ<âŒ¤h¨êŞ7Î„¥)©Z¦ªÁ\"˜èÃ­BR|Ä ‰ğÎ3¼€Pœ7·ÏzŞ0°ãZİ%¼ÔÆp¤›Œê\nâÀˆã,Xç0àP‚—¿AÂ#BJ\"§c¤\\'7¨áEÀ%¾aŒ6\"Œ˜7§.JüLs*ú³\nØ	.zhÃ¨XÈÂ.xÎãòıI°%A b„Br'qª0¥²Ğ¦é2`P¢HÉzÜ(\r+kˆ\"³“{å\"ÒãÔ2sCz8\r#’oM&ã¤a;€Ê¹ğzt4¬`’¾Ê\rdµ	@t&‰¡Ğ¦)BØói\"í(6…£ ÈTtùB#ú\rº”=õÊ01\\ªK÷tÜã(ğçÉ‚ÒÄ¤Éô`ŒCd?# (ìİ'#xÌ3-£pÊ’ŠØÂ›LS#/]¢ƒ’ŞèKğšôê#r¸ä1¸Lûv6bS27ˆ')\nF\"\n/RòDË(­ìk©3¸ÚØ‰,Ó‰Ìƒ\nè.‰³dı2Õê/¬é–&^I59Sc ½-©,¹[fZv:ÖÉl•‡)œâ4C(Ì„C@è:˜t…ã¾ô(™Şø=ã8^Ÿpwš}{\rÁxD¥Ï0ÀxÂ÷w\rFÎ4³s\0ê6CzÌœ(O²aS~—!3\0’ŠƒCî0ŒhBÒõ\n>õ3ŞÎNãÌçH€ê1ŒoĞæ3¨ş¦Ô÷Hè¤zo¼\"Îr»hÈŸ!Ù|.”(ßô³{ò\$-Ø \$\n	¬x\nPS_­s%÷\n¢­†:ÿ<,nÌÁ@O¸œòLLéì“÷^[İ“m€ÅˆW’kÍÛÕƒ\r8‚d‚Àh\r!Œ¤3°ÎÜšJvNT0&[İ>)… Œ’ƒIQ7‰84°Cr¶x¡ˆ÷¾õŠ÷Œ±FæÅ”gÊcÑ£J„ªì2†%€e–\nwe\nş£_Yt8':Ä0‚Q dÜÆC“ç!:Âx¬y¿+b„lù‡27ã ËPY¢4AÀ,Œ¥`ÄL>Mp(ğ¦©{Ìhı,0@Ã(cT'05Ãæ„ÈDc\"§0ç«cj»ŒS0¡½rÂR(EˆÁ%J†…™	É=B/RÉ3,‚£íF†ÒËÔÀe’¹Fb•8™Æ¯‰Ù A¶ÌÒi•ù˜9& ÕLÄä¹æÁ;dĞ=>ôå3Ú[ÄUeÑ|4>Xc-¡¾#TQŒ³š#fq¿\$3-ä[ò¹ĞŞ¨TÀ´YÊa‘\$á\r393Õ¸d\nÀ(F°×?‚zš)ÕT9ÀêtLH8Oü2ˆã’´-VÍ|á¹˜‚æèÄªäfD³àŞQôUX}[&Š~NÖCŞJ¦—B&-&qÒ(F`û&£Å\"!Pè+D–Ù!¤½\0ÑTàdPG5³RiGôh.µÄï˜r\"^ZZ«5AÌ";break;case"nl":$g="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ĞÂn2†X!ÀØo0™¦áp(ša<M§Sl¨Şe2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMĞ`(¢É¤fË”ĞY;ÃM`¢¤şÃ@™ß°¹ªÈ\n*ÑĞ:í|Êm0˜ÍKÄ¤ß=™B¥F€Ã'•K™Ï.O8èRx¾çwE™ˆĞÙ‘Ê‰9C\rÛİÖ¿E°›#–9ñ—ÓæoÁEhiŞ?ÅÈ•5÷Ûùˆäu4âã>TÈ@f7N€¢%Y´–X¸²S)×6ƒ!»BÑêhä®+Ã¢jò¼ïH@¸Mƒ¢é½Ã(ğ¢jğæ*ƒš°­%\n2J× c’2CÌb’²O3Ğ†JPÊ™ËĞÒa•n\"X:#‚HÉ\$Ì#\"ú‰à@à´ƒPÈÃ¯CÓâÀ™¢Ârä1kûN.ã*.7(#\"ğ–#‘sÒ†ÆR˜İˆ³è»E°l`9ÍxÚ\nğé®ÒX‚“¨êdåˆHğÔŠ9Èå6Ibr¼:êŠW;„©HÄ<¥`M*‘SøÔ0KÛ\"¡hHÔÁˆ-'îRêáC\nú)®É\\MB±ó’#I‰pĞ\"…­\0Ò¾ŠÍâ0â¹„˜5(NÃ¸9!K—MŒ¶,œ68Hhôı,”ÒSlØÃb§X[ö²j7 P\$Bhš\nb˜2–(Ú‹cUü5¬”Ô©¶Ë•|†²\"›D0¡–âª‚\r(ìŠáxlÊÔ:\rè¦½&¢b>ş9c`è93Ö\$3ÈòöšŠhma^Ô]8hëŞø×î]@PC‚6½:a`@8)‰í ‘/KÚ‹M«ĞêùÀH¨ë/™Ûä¯gÎvm¡/3g£i~”ã\rúmHŒZ‹ƒªjÊ&`:ŒcH9º-pÍEPI¨«H¶Íª¼¨Üèj_&şkšfH¹ÍˆA›2é»øã@M÷%5‡²àÂƒDÃ0z4c£ráxïÙ…Éª½Arì3…éŸ{ŒMcJÄ„J¨|\$©s>™¥hhxŒ!ğ@÷aôè4\rïsO\0 uÓA© jƒ@åfŞ4 N\n8Ğ´™Ì„£ì0ˆ2µ_g=VX€è°'ÿ|\nÎ\nu{„U¼7¦øÖãbPGë=7èGC1îL©É4%&¸šÌ‘ÁBÈ`¯A’Š˜S \n (1x8I¢=!ˆ×œ`PUAI5ZmÄ”4HRŠ¹.áÙc”¼š:( ×ÂOÈâ#\$äÔ\"œh”@Ì˜s6jü¨”R@Üêt\r6ªmaQÁ{EÙü0ÇMHÄ à€!…0¤‰óäL’µsÙØr'nA¶6ãúÉ©7'\$ìœä‚·TaÁ\$h˜ô ¨æC^ÁC¤Ô ®b	Ÿª¾pñá—NC#·id128sF(-€–“d[+§•–£Ğİ€PP	áL*ÙPI¢!P)e6G-0Ö\\‹Ô Æ8¾pÒJeû§c«t9IÖõ\n˜c,HÔ3‡Ub¯Ü \rfÀÉÌ2œ˜Q	€´‘¢4BIq0PruÓ„`©	Nx'M9+cƒ%”µfD4š„•'5òJ8”ƒ¨•rmP\n Æ}‡¦ó uÃ!5SlDÏ³öÌlÉ+Y£jL©ĞêADB'\r€®c æÚ‘Î\n0ˆå‰X2á „NÒJ_D^!T*`Z8n›G¢?\0ÔQ[lIZ&]M™P@r	Ib½ä«Ré)2´ÅAğËVêìı«ôe/‘©VH\rY­*2°un¯	= 6Ç, ²ÖÚLÒXR#¥\raS“œQ|ÊeÄ„Xc’©¬˜%”Êš\n“†	µ}éŸhªP™ºŠÄ\"Ğ¡,iqD‡ğíÀ‚ä˜£Z&aÕ“\"B!Xˆúâ2„|È—úèÁÎ!ôy½Õ†'äş9o\"ä°ƒ–«YÁ™3Fckè\n\nVñ\\\"c”";break;case"no":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KĞ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ğ*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸İjÍûŞ	ÓL‹Ôw;iñËy›`N-1¬B9{ÅSq¬Üo;Ó!G+D¤ˆa:]£Ñƒ!¼Ë¢óógY£œ8#Ã˜î´‰H¬Ö‹R>OÖÔìœ6Lb€Í¨ƒš¥)‰2,û¥\"˜èĞ8îü…ƒÈàÀ	É€ÚÀ=ë @å¦CHÈï­†LÜ	Ìè;!Nğ2¬¬Ò\n£8ò6/Ë“69k[B¶ËC\"9C{f/2¶ñ3Ä…-£°Ü\nÜÊ.|Ğ…2(¸ÜçJ'.#†Œ`ò!,ú1Oï¸5 R.4A l„ @,\nvï\r²ĞÎ¬Ê€:0/ó\0)lSÊ2BC\$2A+“Šz>ÌP*\r)²W¯«ÈÏ0°MLø¦Ö°Z‚Ôu>Œ¶J@€Ùc%›E4ÕH	¢ht)Š`PÈ¦\"ÛMs”­0»`V(áDˆŠ‚ì¼Ã1š¥ŞhÂ‹{^£(ğ\rÈ4µ\r7*…¦HF2…©˜Ø	ØòÜ#z0¹C0ÍVª¬\n :ÂdÚ:Ô@é:ÊMì€Ø(C”˜dÀÖçdƒbv89ÁhA„ĞHÏåx@88ctÿk¥jˆåZMC• €æ¹½šƒ@4'Ã0z\r	°à9‡Ax^;ìs6­‹ÒĞ3…ê^Û©xÜ„J(|\$£‚óÎhPxŒ!ô!¬Œc}zÊ¨†3IÛVÆ?óƒ\$¥Úùf§EÅ|\r®í5cJ:Œ“îˆR¥\"£3Œiœ´é¤ŒEc—Ï£Íi £¨Æ1¾ã˜Ì:ˆã–¶vèĞ™uc˜Ã„‹Ê\r+v¸®jfH;FÉú‚Ãû0Œ'Ãs5÷(	€[íû°»\\(¡Jš€áÜb–¹çØè‡-\"ılÀLƒ{C-/qaÖ†På›Ğ_]I™5p)«4\0ğ+Ì#°82F†€PNv 4†7–Ú;]vpiè†êPIJIIi4Ş„0¦‚3\r\rä\$¦3¥ŠŸKaLtA¨2™F_²[%e<—“\$|M‰%'áÑ2”ÀŞÈÓg,ì¥³ä¥ĞÉ)	\$D<±b Xo?E->‡HHh‰ğq§ÜçcØLBdm]ú’˜ÒAy)\02iù¤‹½¾wH(kˆ‘©¥Ø^PäYñ‘¦07ÂšlJ`s\$õïGN†AhkKD˜3‡S–~'ÌÌ4¤®cÁ\0k2DprDI¤‰ !L(„ÀZI+ÜjÁ*foCKyTN<ºGh*ÇÊ’[\nF,º0æv	×›rqù£2G&QA{1kîoIJ‚ON˜Ó=ÀäBVjÏe\rÓÏiğJB#\r€¬5 ’ĞÎtdùÃĞ“S5ÙI6NqÏ:6¨TÀá††PÎyC|4)ôÅ4ò34üéŸT”¡•:P´Ö¸K—eR.+0|M²A‡ªˆ÷b\\'äy,ÇÀqKùÖ<ˆâÚ’M”#\$ÒšxÙDü\\iÁ¤¥›Izç\$Âï:m(À½ĞAH'ä`Ÿ°Ø|g\nÇ¤´®n`¬[ƒ: 	iA3„RZ­Mùp¥ê0I–­\$)Áx0P»„¹]@P";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„İ…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚X1”b2„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑFFÌï6ÆÕ§éŞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ŞĞçrÔèñZÊ–pÜók'“¼z\n*œÎº\0Q+—5Æ&(yÈõà7ÍÆü÷är7œ¦ÄC\rğÄ0c+D7 ©`Ş:#ØàüÁ„\09ïÈÈ©¿{–<eàò¤ m(Ü2ŒéZäüNxÊ÷! t*\nšªÃ-ò´‡«€P¨È Ï¢Ü*#‚°j3<‘Œ Pœ:±;’=Cì;ú µ#õ\0/J€9I¢š¤B8Ê7É# ä»HÈ{80¡Ã\"S4Hô6\rñºŒ,§Oc ¾ˆûÒ\$@[w8î0æ4¹nhÂº¹kãY\0cU'>ˆ Éˆ˜È“1c ÓoøÔáSõ\r:ÊàRøô¥ PHÁ iX† P¦=£[ã ô‡¨Ãb†ôŠpc\n	ƒJê:H†ù¡2ä]& PŠ§£HÙ#,Pî1È±º{f6IIˆBÊSó`+¥ÚDÃ]ƒšR)ôØËl6Ğ\\Ş7›ç^×Å´šßƒÍäA^˜\$I²½â@	¢ht)Š`T&6…ÂÛîû‹ P 7Ú…äÛ&ˆŠÊú6@J€@ü¸ê\0Å–Eƒ^9f®8ğƒÔ8ß¦ÖJİ\r“Ê‚ èN^3É>›\nq:i<İ”%Ù4PÊV–¬Sr1XäÊŒAú;ÃXŒ3›#¾r)áK«ˆ:9wŞ°2kJ¸Ë®£ÎNÃ¶–{.Ï9®ÛXçÂ[~>¤¥@nÃ«…½(;âc­¡ü¿Áì|.Í8í§ÆqÛŠZ¹¨<Ÿ*:&Ú¯I9¥pXÛv§è~ ‚Jî<ŒôµÊzµD(_¹v#\nch)\nPÑá(#:STCñ\n…àzp@(#C 3¡Ğ:ƒ€æáxï÷…Öîí…ÏÈÎ`^2çh†|x\"*\0øÙ,§òKˆ„\r@ğ†|P—˜s\rËÊRœ¹PmeõdĞ¢\nQ%…’jz‰ëÁ(tƒ2ğÄÁÃ«Á#ğÔ‡p@@P&ÁP4  ÂÃ igå	mÂL€ˆ`rÇå\$©°Â˜z	aŒ‚‡0Ìb2„JÑ:6º€ƒš‹@AŒÈH]ƒ`s3èÇ†ôJ‘<pN€(b‹µº‡ËœmñÅÃxr†	y1&eÙI.‡ò—2èDC¡räÃÔkÒ\0Rß¡b4gXLˆN1D\nçJD@7”ƒ¢¨Cp€æX,‡ ´–š0ô„SƒOFĞôÈ# A	tT7Á¸ÕCÙ†ZĞjB&L¡€ÒØ iï#ÌXÆKd'	É˜Î†”ÔJùªd„@0¦‚3Ş\nn Ö;öPäKA¶,ÜòSºdH 5Ÿ„¤ãÜ¡9'dôŸÁBD”ƒT¿‚\0´CY:.Hµ£“_&ú^p™¥²0˜™ù.A2?2:ñYò\r&°§2óäĞ¤pëü=y4ßd›`{Áh6•³Ÿ”™)ËD¥S–Â«e–ï\"‰2êD ˜…\0003M êGCy\rUEš»˜‰ŠXk5!L(„Ç(Lá.AÜO•\nĞrjo*V@‚ PlQÁM¥8ƒ)c€()\$\\Ã|%H`ñõIµ…S\"Å:ÀÖa	ğiRÆÈØc&Ë¬İ•:N›SÂGè“RèI½TûP¿íU0V¶ÓÄ+`¦íY“UØ!¦ Ø\nÃYU#ó¶{T7£É9‚‡ §Ò’M‚Y‰°1 ª’Yè¡É2)E°¾æ~€¡XU\nƒ‚mll¡/„¥ÖWùQg)¶TŠÄŞ±H—ÈmAw½9°KĞ„¥UêyÄªöß«\0œÜ6›h	À&²0òPb#¨r£G“ükÍO<”2ÈPÆì!D‡ä\\ÅSÙ¬iÄãšcQ/îI·”ˆq¼<“»{ê#±JFÅÄC—\reF#Xìá8‚Üé@WÔş‘óÔ{#‰B9ì:V\"İÌñ·&-[%PnÒd?³l ÍİSIÕûY'JƒÔsÕÎ=&™H€jÅ40¸l‡á¡ìô²&}5(9o/Úhúpƒ€";break;case"pt":$g="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀŞs9°Õ§c)°@e7&‚2f4˜ÍSIÈŞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔ»	&))„ç8&›Ì†™X\n\$›py­ò1~4× \"‘–ï^Î&ó¨€Ğa’V#'¬¨Ù2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ğSy¸éxáË`†\\[\rOZãôx¼»ÆNë-Ò&À¢¢ğgM”[Æ<“‹7ÏES<ªn5›çstœä›IÀˆÜ°l0Ê)\r‹T:\"m²<„#¬0æ;®ƒ\"p(.\0ÌÔC#«&©äÃ/ÈK\$a–°R ©ªª`@5(LÃ4œcÈš)ÈÒ6Qº`7\r*Cd8\$­«õ¡jCŒ‹CjPå§ã”r!/\nê¹\nN ÊãŒ¯ˆÊñ%l„nç1‰ˆÂë/«Àì¡=mÂp\"±m¤—1A8ë#2Jèò%\r;ÒçJÎ0š€®“ë”‚2iôr'\rã²3.³í¢2ò„!-1M!( òØOĞ¡xHÕAˆ(&ÃëBC‹†6VÈ8@6\rìrö'S;&=ˆH ÍˆÅ\0×ŒkŠòã¡jx4¯b\$¾ ¤«œ¹#r¹(©JVãSÉ=¦“%	Tl›Ó´Â0Ú•Ò•ÈIÀÂ3®‘È\$Bhš\nb˜2xÚ6…âØÃ…Œ\"í–2Ù®k”ÜHR‹2ßÀê‚\\–¥ÂÙC8Ò¹vsXŠó\rÑ´©d7ŒÃ3×o'š•IIÊ6½©k&;ˆË¡#–€¼·b9¨2@›èÉ.®	¬l0…ˆì3\rÒXå	ÆíU\$Ä0ÚL\"B–\nı¬³°°@ ƒC:3¡Ğ:ƒ€æáxïÁ…Ñ¶–ƒ…Ë Î¥`ñ’YÁxD¨ÂHÚ85òsœã}„pèŸÓ\r§B0p8ÓHšRz”‰Å°‰¶)SŒ©\"Ø°N“·dâ¢fŒn{šö¢LÂ#¨8ÌºIÔÀÂ3mZ€Ç©c0ê“W‹»ûäômÜúÉÈ.ãØ%cfN‹2ãDc‘¥²ä'P1\nÜ^\\ãAB€j0Oà‚ \nI9^F&,9‘ä€Ib49«yâsfjÍjÔ6\nb#z~azWÜê‡„AİQ²QÀ0`@^/\rÁÁ=¶´&…^A¼&N„»7µ2İ1Èx2Â`ŞêOèC\naH#C\$Ş(S‰7…u4ôÙ,.-˜»Š‚‰ÃMQ”†Q_¼B'hñæ´§VHù~ Æ-z‚0K[(†/1òpHy4ˆ!  ·h)¼6Fu\\•ä4MˆA–ÄúÕâtföx¾xS\nˆ)£rxÉWX éZDDP@—C u!d¸ßÂ|Fd{sFéû“TÆKry9¸˜ufšÎ¹—El¾A˜ãúm•â6 jd»\0¦Bbƒ@u\0Œ =SBô¤ƒ´D‘\0€¥(f]1%=1ªNó@èLRi1Å œOchÆé”ŸŠ^s·¦˜×X.]´É0ÍB¨\ngˆ6¹0UÌÜ!H(9†ğÄge¡nW„¶%bNC-Wˆ°×º<ƒd0\n¡P#ĞpIÃpcŸ!¸3“…ÊgT©œ…Ò®Ê~g§„q¨d!u¾²úS‘ã%‚Ñf,å	Ñ„\rˆäÄ˜°ÌX3¡Ìƒä¾—jÚlvà(£UäÔq‚ª|LÍ]—€×>+q¤„°‚¦’K	ÀL\róH£Rp`™Eƒ1tñW”'¼Fºe¥.·QZs˜LeÊ£ÔP*IgK0„†J\$¯yé÷9zˆcÂ±VÌ\\–±Hâ^M•Y0¤RİU¹İR\r";break;case"pt-br":$g="V7˜Øj¡ĞÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhXjÁ¤Û2LSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RğQ\$Üs…šNXHŞÓfƒˆF[ı˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\¾i”A€Ì_f³¦Ÿ·¯ÀÁDIA—›\$äóĞQTç”*›fãyÜÜ•M8äœˆóÇ;ÊKnØˆ³v¡‰9ëàÈœŠà@35ğĞêÌªz7­ÂÈƒ2æk«\nÚº¦„R†Ï43Êô¢â Ò· Ê30\n¢D%\rĞæ:¨kêôŒ—Cj‘=p3œ C!0Jò\nC,|ã+æ÷/²³â•ªr\0Æ0˜e;\nÀÊØª,ƒ®¾>²<´½\ni[\\®ŒªÍ‰ƒzşÿ©ã’z7M*07«òëJò¯A(ÈCÊÒÔÅ4ÛCÍ@şA j„PBƒN1´š0I¢\rˆ	ã”|ÀĞŠ2¥G3jÄí½£ó`Pjz4°o` ¤c«¢½4`ñ(P)k)N ã\r¡\rãJT–%ÊH]NR÷\r ÜËâysÛÊK#=ä	@t&‰¡Ğ¦)C È£h^-Œ8hÂ.Ù\r­”è:­íìõ³î#¼¬&)‚Wä5DéXçeŞâc>Å\"ãcÊ5Mb^ï\rã0Í9Ñ2–©.UÄÍ¼é+{L42:É7¹ÒFÂ¬ƒƒ40·¡bA\rC‰ºa\\Œã¨ÊÄâí':#*r&±È2`8Bp­|ÃiÍ.ƒZÑŒÁèD4ƒ à9‡Ax^;ğv ¨Ñø3…é_<E; „JÀ|\$£ƒk°à^0‡Ùq'Š.:(#Öï*R%ŸM3v¾7û“1¥ÅqèÊØ6ï{ZÅÚÔ\rğÂ1ªn€@;Ú	KÕ^4T¼#6ÍhRF3©N°ÀxêĞà;Ï¼œ„íÓB\\6^èË:4Fy+/e£ôE¹D¬7Ab€(AĞƒıAAX\$¨³#3\$É	a\$Ä œ„3 £!é7\$€Ù­l¥ßñ¸8Gñ˜%rÒñ9\nÑópì›A\n;çıĞº€Üª\rmµ)pîpCß*!¼4GÀBC\nlDè7ºsşÂ˜RĞ­8Šæºİ%Çr(§²Í‹_Q¤ä(C¢ğ (E£?C¼šÜªCQ%D©¯cÑÒd˜5T5\\Ã^á\$Š‡“V‰\n¢\"Ä­ÑœphÕ±fCfœ„Èá¼-?á\\¢Bp›@gˆa@'…0¨‰’>'¬¨ÀÎ•NËb	t2RLN‹(Å™\"%ô\$£*eÙFs ÊUXÆu³şšÏù»W-B\\\"ü˜Q	ˆn¼0T„ùK”güwĞhf‘’9t¯%Y¤efr.d|m_ù8\nJu‘Åâ¹ñÔNd9ß„ùÒ¤Í;ğ¬ğ¤\"r§V oD÷JU×BlU^t2x¯p†yC`+’¥[`Ş¡).Êå³’öä—Œ˜-W\$ä#MPÚ‡ĞkË{T*`Z8c\ræH7z¥Í\0Ë”ïÆ’C—a¢F™!¼Õç7„¥}&56—ÉI˜bK,ê·\"vcbV	´ì4†`òÁC(c4aÌ…6¸cV3µT ÷ŸR§>Ù¢¸0¬ë:J•cdMGUÜêF_	Ê…™…›Ó¬U<=A@¡¨t¬0ÅÓ.(Åé.¤v])N{•\nV Tµ)Rjõ\"éõ‰`È‚¹Y<?ã(å-±›H}5“,Ì	¸«æ5˜³[ê";break;case"ro":$g="S:›†VBlÒ 9šLçS¡ˆƒÁBQpÌÍ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ğiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’If;ÌÌÓ=,›ãfƒî¾oŞNÆœ©° :n§N,èh¦ğ2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-KŸ£ë û!†{Ğù:<íÙ¸Î\nd& g-ğ(˜¤0`P‚ŞŒ Pª7\rcpŞ;°)˜ä¼'¢#É-@2\ríü­1Ã€à¼+C„*9ëÀÈˆË¨Ş„ ¨:Ã/a6¡îÂò2¡Ä´J©E\nâ„›,Jhèë°ãPÂ¿#Jh¼ÂéÂV9#÷ŠƒJA(0ñèŞ\r,+‚¼´Ñ¡9P“\"õ òøÚ.ÒÈàÁ/q¸) „ÛÊ#Œ£xÚ2lÊÊ1	ÂC0LKÂ0£q6%ŠÃ3¼ÌA²ïñAÊ2õÅSb„nºŒ,ò93¢`Ş3ÆéÀà™¨£pÊ3«û@Ö+©Äï´¡(È\ròµ\0×Ö…CÊ°A@PH…Á gh† P†‡¤5jî¼ ,;¥[Oú˜:@CZ€À¢	a:\"€Ş˜Mw]î\r)CJ\"'€(VtêŸHO\"8È¦T°¼Üp(‚–Ål†äØª+x\"\n63a®b/pØ¡x*£h\$	Ğš&‡B˜¦‘8Ú6…ÂØó›\"ë¥y=èˆ¦¹iÂ¥`+Õ‚¨©ÔV‡ÖhK¸9§¯ú³”Ø£um€3ÃböËgc’w4	(\"bòPZ&T°@1´ã¯¨RÌŞ¡´(J#‘Ğğ8IÌPXAã:ëÎ»·YJÃÖÌ°5Úz&Â¯Ú?Ä£•~±p\$N‰`ĞòÁèD4ƒ à9‡Ax^;ör”¦VC\\¼á}gİæœ7á¤	3{+? Aà^0‡ÚB‰@\r}~à½£ZpÍ&ã•c~¹ªÀÓ½Ç4Ê1©—õ%Õrğ73[\0¨4'¬¾î»x›2~Î1í<(àÌåŒsr+Ì30ØªÑ‹ö8çø(´şÛÜòı\r%õº¤tÔÛó¾&Fš˜³kÃ¼:ï°1spÓé8C«K‚\0PTI=gqÆ%óìp\rÀp7Fğ2›å~‡Ãt)Ç%\r‘ÀÙÃ¹á'¯¼Ñ6ÂœKš\"*í°Àœw®‰!s™úœ€Æ\n!\nuœEfŞ£\r2\naH#C‡¬`JB!0„6à@	H}¬1í\$´ÊJJE(äy.’UnkRáMCï²:?VXğÎP5‡AšA=	\$\\<›\$.UüE4!¹éœ‚œyˆuRDµ‘à‚RÚù^ŠÆ1Àt,qÎJ\"7ÎL¬ÔPÂ€O\naRªãä{O\$v\nŒ<¶¶\$GÃª-VH]ƒ(²6™‹ËkQÄu@BlâÉqJˆ´2s2y°i'hıº5ˆÎ`N)Mö¸`¦Ba[G&ì–`¨ä¤m‰½6Â´¥i9lDğ+cÈÒ2T`D±ŒIàhÃs,´4ÀPú\"Ö¨£È(ÍQºhùòht†Hfb¨Û¢¥h6½ ÒK‰\\-X²ÕÈƒ,ÅX»¦¦fœMZvj•Á®†J6¹j½CY7X\0€;ĞŞÖ•z§k5N¡Óuë‰ú9\r¡ÖH?”bB F ázl}‰êÅR_ÇXÅ+•td4 O`±š‰/#\r5\\Ê2eØ&Ó`ÌYX5–I©´ğ¤hiG„Í- ­UªÅW1d¸¢Xê¿[—éŒ¡¾C‚XcåUÕÚpCÆ»j5]_ÓVqU*ª)Eìûª* _\0Q5MÊ”*ò´yÕÊ1DÔ‰«úyRO\"ÄºÕ\"DY¥ÔeVdZĞYŠßÑ ‘Î„5d5ŠPÔÉJ9!Êíš";break;case"ru":$g="ĞI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hĞX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ğ&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)û‰\0”	Nd*;AEJ’K¤–©îF°Ç\$ĞVŠ&…'AAæ0¤@\nFC1 Ôl7c+ü&\"IšIĞ·˜ü>Ä¹Œ¤¥K,q¡Ï´Í.ÄÈu’9¢ê †ì¼LÒ¾¢,&²NsDšM‘‘˜ŞŞe!_Ìé‹Z­ÕG*„r;i¬«9Xƒàpdû‘‘÷'ËŒ6ky«}÷VÍì\nêP¤¢†Ø»N’3\0\$¤,°:)ºfó(nB>ä\$e´\n›«mz”û¸ËËÃ!0<=›–”ÁìS<¡lP…*ôEÁióä¦–°;î´(P1 W¥j¡tæ¬EŒºˆkè–!S<Ÿ9DzT’‘\nkX]\$ª¾¬§ğÔÙ¶«jó4Ôy>û¬ì¹N:D”.¤Â˜ìÂŠ’´ƒ1Ü§\r=ÉT–‚>Î+h²<FŒ«Æï¢¬¹.¥\"Ö]£¦„-1°d\nÃ¾å“š¿î\\İ,Êîú3ˆ¡:Mäbd÷¤ÚØî5Ní(+ú2JU­ÌüğC%á¢GÖê#šë\nÇTñæšä,ôóµ`#HkÎ–ÅµJÀäLjm})TëÊ£U%•c”Ä»ŠÀú7“\$ÛqNË€î8N\$@#\$Â_Ì“­ÉW(mÔŒ“õlİqµ/Ä8Œ“Îu±\\¥ÀY(¥\\³É75øëÜ-˜ŒZtš9D¾¿Y.Bh5™C÷Ø%„’ÆA jpà‹ËBá£8¤ŞGe‹Éx•Z,ôrhA	…7<2A MÛĞ-ƒXaÖÎ–€È²<|V¤AuúhïÖšÔHjŸ™ú†ú)hc¸ìª*ûdªR‰Êû7‘yêKZâ™ Hª‰})¾ö¼YWÛkVìãÕR_ÀOÂ¯pÅ(“c¬%,òÜ\"ÅÃqÜø!³ïAÈ;jrØÏ6+ÄŒÖe8th)\$çw\0(Ê>ZÊwd-¯EŸ’.È™f½fa¬L°¨‘Û\$\n.Sóøğ8z¬è°JÃCÃ14¥ì©·mv\n\r@\rƒ å\"6ÕâÅT\$oŸ¶Å4p“şQJ!hy©äâ¢#x¡êĞil½8tÄLMƒÖLõS#îrÒ¼©y±6ÒòµÎBFO	è¦ã’A*<;‚İÇ@³èCÔ±6nU¦È– SÆ„Ï*#h «V,\\'!RÁs‡“(°ƒ¬\"!×C„Ç†@W^4/0„ØEÃDÒ¬8)Ğ.¹˜|G¢aPq\nˆ¸_äI‰p~'B\"«	\nS'ïZ¸°SâÔ1.­p§2„•SìlTLƒ.Ò˜Ç—Bû†héO’¢>Öò-_‡lÁ”è.ñÎ+ÇÒb…“ì%`¬„ˆŠX¤aÇq_I7x«ZQ«…w¯éBb%ºl@ğ0‚\0Ğƒ(f ˆ4@è˜:à¼;ÍP\\C m\r!¸2‡ \\Ãgá”7N0ğ' s\r!¾r‚\"ä†‚ó*5;ÇuĞxaĞ,ÆBâå+dˆÉ”É.[:;ñ±™âJ#Ë¦vK*N”Ù@†¢’,&®'¸ôÆ‹Õ…%„º«‰0¦QÅYM?uÄ˜œlC)‡ÆB”²W e(I.Ë=,ä‘@7\r©©9\nO½X–·rÅ ©Õ<©“¾Fäˆ‰Õ£ˆƒ™|ÓÙ¥/42ª@…ƒÚ\0&ƒ’Ú ±µÈ—X˜†©\"u´¦#ÁRš_I\ryHusQ¨Ñé€?Q1TÈš¥Ÿq-YdœGÈ7¸“S4±	²'SE1G«ñì`T@¹—'FµDèB¿½õ·Hj‰Á!©æL½uÒT¨‘VaL)`[İlz6…Å¾ò½ê	BF\"EBºJ€LñôyPÂÀ²BRäóÆ\$+-ÒX”#â [±ŠÔ‹jzĞ\\\\1	ü[8:(à6l¢1=>± %iœ° OÖ™wO<å\0Ñ´¤”A¢Xv‰&{P° Í™·7e+n,*(à#– ÊÒ@‡ö[EóµZ3\"_Ğ\"W'´Œ\"›P \n<)…Ivpªq´iREŒ|˜Š‡,g°hˆ©Gb1„jL+±“1yX6³‡¡h“bÓJ™9ºFñbšr\r‘ø©•{&›÷}¤#Æ9\nM=a(ÓBQA¬ÄiW…0¢-ûz*¤ò!‚\0Œ‚»:ì]íôèÓÓPp\$ª…—¼'bM@eÔK’×Ú†#EÛ¯q(ŒèÓ°Å‘D!±éA¡¥	'¢‚P…xŠÜî“KN`õ¤¼oL„XÀú…8:W1EõqgÖ}•ë7ÚLá£¦-;\\×´náİ¾V—¹æŞÔMBò\r€¬h\n–õ ÃH‚Åvúåû‹Ê¤h˜GPÊËŞr¦Ğ»™k­¼F‚ojBŒÅ&C¨än´\r\n1ûQÂc\n¡Rß„âñ³ıŠiò¯pÂÙD§İ Ğ_Yù{¡Èœ‡İs!áååPCN'bx¶‚@›#L?lT¦‘ØnŠ\n,±QuLKíãÔ3÷Ä1_;¶½¢ã7¡ˆ6¥ãhG6s{ B‰Wà)¯^C*Ú’ú,ÜöÕáf_¸/ã¯–ThcÇ™…b;zN¹…@«š¿wˆÁ„.ôa-%ö(ƒÎcrŠ÷2°Å‰¥êæLIbXm‚‡\rVŒ¬Û3û€^…LGô²\0¦	J«Œı6†MÆàÁ eXg'qÂgæüÃ@ Q#\"UŒÒÄÖÃ­‰©6±È;â„—…7í—%‰Ï7gkÃ›FÓÍıá G^v\"(Äì=fû¥CDœ–ŒMÛ	\0";break;case"sk":$g="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØŞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êp/ÆƒN®şbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜Í\0­ñ¿!À‹·ôF\"<Âlb¨XjØv&êg¦0•ì<šñ§“—zn5èÎæá”ä9\"iHˆ0¶ãæ¦ƒ{T‹ã¢×£C”8@Ã˜î‰Œ‰H¡\0oÚ>ód¥«z’=\nÜ1¹HÊ5©£š¢£*Š»j­+€P¤2¤ï`Æ2ºŒƒÆä¶Iøæ5˜eKX<Èbæ6 Pˆ˜+Pú,ã@ÀP„º¦’à)ÅÌ`2ãhÊ:3 PœŒÊƒ¢u%4£D¨9¹Ç9¥Ò9ˆ£ ÒÖ@P ÏHElˆŸÀPÕ\$2=;&›€9Ê¢ ää’HA:Ó¥7EÓs£MØ×*„£ @1 ƒ VÕõˆóYÕÕ€ÔÖÀPòÕMÁpHXÁ‹æ4'ëã”\rc\$^7§éëä-A¨ôJÉBb]AB×=Ê¢´™)Yâ(Zõ£àPŸÒÃ,ãFRQ,Ô:RO@4I×z…*1‚n#wøÂªm\\2İc\n>8Ø4à—„©9áOî°¸Šnà²a—®–3†]‰\0ì”¶I(õG	Ğš&‡B˜¦C#h\\-¿ïøºùBˆ2K¨ˆÚ°	Äc‚\"‰Î’¦)Úf–«¶Cu,7êÉM°=&clœ6M€S:¤£ª`Ş3Øš0¨¿ÉíwÒ•¹w›G>-c(Ä2ÎÉíO®LĞë¶z»ø;Iƒ“ÂïŒ!e?IÔ*Ê™Lqê<k“ÊR•òH¤)ÂÂã–<Hå…Á\0x‹\$ƒ(Ì„C@è:˜t…ã¿t/ƒjêÿÈ˜Î§> ñªğÁxD§ÂHÚ8'PÜ:xÂiw¸Ğµ‰Ö5©”>ÿ=hÇ§ÂpÜxËéchëK\"Ãò¢&©ºs\$¥\" Ğ¦OC ÒÖ\0w#á±W”Ààƒ1MJ¸0†fZƒÃ?p¡˜:ÀB@]ä Ö?²*š\0ctëIé—°ØŒŒ¡{/¦`ÆéÕ\"@	Éğ¥‚àVƒƒ:æX¦\"‚4Šya™\0¨\\+aã\0 §’RÚÁoø7wºãÍ1¦¥W!èjÍªAÇ|wPŸÑş|&¬‹4(Áuƒ¯„7\0ê„Ğ«¡UÁÜÚ2g|İ”p„0¾ğÊJS{Ğ@Œ!î¾øÂ˜RÎ¥&ˆàHr}Ê„Š9“’JX“ê8‹PF¿vzÉi/&!¸<¸ŒšÜ6'*“ÆêBÑĞ§…–·,+PùN%!\$…‡“=\rƒJ®4h9Qªè7]8q¦©d\0‡ÂdwÄ`ŠA²sIƒ±…\n”4[k<\$ñF\$„”xS\nÙ¢Ë‡¤xTh§œ'1.¥áL{e½””T‹˜u8²”5L‡NÃ¢C•³	±LpÆÁÁ¯\$ğàªòæ˜Q	€‚„4£E‚0T\n7*â]£ŒÕšä1¶¼ÇÌ‚«UäÜì‡“Ö@Ë²§øÓÃƒD©ß\r!ê!\n„ªƒQ\"IP·î(IJ´U'XÈ¢úvH vzä;>fHt¢zl\r€¬5±3ó>I€S¢´ãDš:Hı‡§¤d‰HF‹@÷™‚¨TÀ´ÔVFÏ< `t¼‰«ÆFÂU z-­uˆ1&)e•MIVfÍ†½gXüqyöV¦²X9i\\´Ç!ü˜P\nK”#ü‘öü¹Åj˜16ÈdS\nÉ¯.Z#\nRF“y%1F1\rÃ×¤RM’»\$4eÊÒ4Nº##j­]ÌIÉHL\rôp6‘4­ê/‡œ‡&Â`~©Jh•„\0 †¼™!<d—íŸ%hfp*¸3¨Â`¬PUèS^A–)¢PÉ£9&0\"ºK*t^Yk449ößÍ½·I„éF‹l`Ò¨RÁ‰8";break;case"sl":$g="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rğY”]0šÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ğj6 ¨!„ôn7‚£F“9¦<l‹I†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ­†»fnœ_îT9÷n3‚‰'£QŠ¡¾Œ§©Ø(ªp]/…Sq®ĞwäNG(Õ.St0œàFC~k#?9çü)ùÃâ9èĞÈ—Š`æ4¡c<ı¼MÊ¨é¸Ş2\$ğšRÁ÷%Jp@©*‰²^Á;ô1!¸Ö¹\r#‚øb”,0J`è:£¢øBÜ0H`& ©„#Œ£xÚ2ƒ’!\"éÊl;*›1¥Îó~2Èú5ÄÏP4ÅL”2R@æP(Ó)¤Ï*5£R<ÉÍì|h'\rğÊ2Œ’Xè‡Âƒb:!-CŒ4M5\$´pACRè<³@RĞ°\\”øbé:èJø5¨Ã’x8ˆÒK:Bd’F‚ Êà(Î“¨õ/‚(Z6Œ#Jà'Œ€P´ÛK‘¤Üğ<³@ ”-ÂùgÍhZŠ£Âƒ-`®àM¨6!iº©\r[6İ„«[ÉíÀÙl•[V„4…×Mª†\r½Éx\\É\0ì—I@Ô	@t&‰¡Ğ¦)PÚo[Ö.×K«(ÂÃ¢[´«£/\r3hÕà5\n>B9d€ğ€Ğ8ß–µNÚ<6¯ƒdš1Ld€¨ŒÃ2t¨5RhË#;¶\$àŠMk))¦ã¨æ8he\n=˜¦×ÓÀ–\\pA§°@ßY“êÑ¤O‚—‰¯Š”?ÃœeQrõ­‰»X2ŒÁèD4ƒ à9‡Ax^;ğsmš*\\á|Çep~\\7á	#hàËÉcpèã}”ĞCD&Î2Vˆ’ oU€¨sĞ\$'7—nŒ<4šH“ICxÎ7¡0z­9Â1¤¹x@;ØCe&jÌIp Â3mh ê1ËpÌ:ùÉÚäyƒ¥óó C˜Ã%„õ¤¨øæ—ˆH+zú40Â,©Ağü(x!\$«åü!túíZØH\n\0€€RGI2wÁ¼Üò^ÙyPyAÔ'ƒ,f?†lÒŸp@GÉ\0wP¼*<R\nlÌÚâ?É`ãš2[ƒ€u?§ı\0‡\$(Í c_,Ğ3·ÇŸ\rŸhaiÉe(—d¦ÿIQ-9)… ŒÖ–y×ZF‰é‡ Úø\0 :ä	†³Z1&dÔtd°Œ‘ô‚fá†•òx#£V §È‘ ø,ÖĞ3^l	ôš¥ É‰xI\"aäÅ’pÒ…AøAèQóBR\nC©š'á˜öÀ‚ Kqê†Ç 1’ähá)ş3(‚“’vd C!è›…\0Â£ZN¼5uEo\$aüÀr>IkÆˆ¤eÛ8‘¡kò@m¡;ºà€)…˜2Â F\0›„`©ÈZAìŸºÉ8’š@r&n)¥(¾ƒIÔ2¨7JÉì“±=BeJ:OÙê RaH_AØ¿ĞSTŸÜéF9}§ú\0HS¢>‰.\"çEKÒ‚]hÑÈêEsÿ¤)1zQš6pcªù¢‹¾‹(\$ûÒhla¬³jNÑh'Ğ :›òQ‰xFœ@‚/Ô2ë\rB¨TÀ´20Æ„Îx‚qõ;Ó4(a4Ô^¡V­‹êN¸×}`\$¡–ÖBCY’ªí_u¨Ã’à[ªäv_U¤ÂÖ´FîÙ³ŸD¤¹BìšmXÁä²bbğjh\nEÙã¦ğæŠÀUEP’Bf•ÃĞ’ĞÈKB)Du¡3“ “ÒJKÂ`o›fšilM±Ğ8‰4…¬clpQ C.À€Ö‡§À\\Ô|¬*6åV°Ò¤«¢XºôÃœKò\0\n	d€†+§Ñ-nD¡%RÙˆ…íœ°Ë€4';ÖµÔ`(";break;case"sr":$g="ĞJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãğP”\\33`¦‚†h¦¡ĞE¤¢¾†Cš©\\fÑLJâ°¦‚şe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍĞñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰R×Ò”=q0ø!/kVÖ è‚NÚ)\nSü)·ãHÜ3¤<Å‰ÓšÚÆ¨2EÒH•2	»è×Š£pÖáãp@2CŞ9(B#¬ï#›‚2\rîs„7‰¦8Frác¼f2-dâš“²EâšD°ÌN·¡+1 –³¥ê§ˆ\"¬…&,ën² kBÖ€«ëÂÅ4 Š;XM ‰ò`ú&	Épµ”I‘u2QÜÈ§sÖ²>èk%;+\ry H±SÊI6!,¥ª,RÆÕ¶”ÆŒ#Lq NSFl\$„šd§@ä0¼–\ne3ÔóšjÚ±Š”µ”tÓô‰6ï]*ĞªÒÈ_>\rR’)Jt@›.)!?W§35PhLSÎùN¶£ëk¨²—@[öˆJ2 ŒûÎ†7=Ò¢Ì·mĞÏ^	{Ì’K‰\"æ¨\\wøbµÚoÍ\\Œ3¥®Ï²J	…%¯ñ OĞjCöóÕ6ÒmÖ¹ ™š8ì3jÂ¬c:ÏµŒŠHJ ¡tê·*HOKu“æ“¶Ö”1œ1”v(˜Cjú¨×İË« ò®(\"Æ]åÚ45,/+¤ì Ój^Y~ö¦‹¦—¦êyŠÄˆ\"ºÖ¨¶–ºÆ‹©B–Ÿì† ³lÈª°(Iã:ZB@	¢ht)Š`PÉ&\r£h\\-<hò.´Y5é”Ód¸˜ë Pˆí»ÎX@´œ^7s®AÑt(ğëÃ˜Ò7õ«Z•+-àPØ:MËv#“‚7ŒÃ0Ù	¯\nŒNH¾g-Ö»P'Íd6®Éå§šÛ­x¼5q¢-b#‘Ü{¤L·¬š¨YnĞ–­¨{ºÓ¬( P›ºã“‹\$IC•ÑÕO|“\0<&õß`zƒ@tÀ9ƒ ^Ã¼Á„2×ˆ˜gá”7A·Ws°àˆ´à’CË\r°p:À^AóŸ9ğ¬ì†õĞtA\0m!¬à†”ŒŒ!Ğn…‰5Šµbè«y\"ÎÌ˜Ÿ,EŞÚd¨2x÷‰¹f(AP4ÂÃ£¯EÁÜåÀ@pF™ÂµĞC3õHAŒ1œàæƒ¬f\r¼3¡ AÉĞ‹¤ˆ0Â°@ßü,\r!„62ÖfùLL´Î­ QK©}-¾ç¬F:]&â\0\$’[’‰Áµ\$ )>K¥!»…g:ãƒ”s*èHÈ:ó¶ÒŒaŞ`Å¸ºïÇ€aÍ#ÇY¢‹Ì=\rÁÀ:¤gğ’ãùÚa¢†Ïc9ØaŒ0‡TtZÊ!cVˆ5„0¦‚2Sz­5‚—d*ËchÏ¼©‘ÅEá`Š”Ò•ô<FRÉ5¡¬ï¬£:AréR'¾U,çà4J¡cPÒ‘§CBAqN ÉE•…lºÛjA\$‡—vJè8iènv{¾!Ôç\$ÌŒƒh 0VÈ(9!ãÚ:S#œÚlérPQ”'…0©'¥Xºi´¥m%‰Uˆ\r%\$Ş9jÂ²i[îy%*˜Qd©Ij¡Pè§Ñ£AÌ”J¬¬‰'—2˜†jÂQTº#to'b.:qî\n;ÈÏ9\0S\n!0i~LÁRT}4aBEš5¤\$`p¡éL¥a¤Êâ\$TŠ¯\"2ˆÜ[fQí«â2Fşkz(múhtÙ\\9s8P—räZ×š¨ÆLİ\"jífé[BtBâºêşí6›¸}.š	¶×X·]“-Àlo”‰¤ÄÛë½X¯%Ø†EFßpÖU\"¡@(#YğÛ;’hšà€*…@ŒAÃ£pÚ\\İÑ^(‰<©ÉSVÕ…ïÓÜl¸l™+Så‡Í‘2WßÒÜ9‰•ğ¢Q%²Öu“\\3f-”R*ü° f&<º·µáÖXĞf—í;¡Ì\0jØÚÃ·Q58™œkq¾#8ÕqKóŠŒjäOo<­Ğ¾gR‘yh«IU®¯s-ÉÍÉƒ˜²¬b'ñ6•­XLªñJ<¢í2Â;ˆ1UÜÄ\"ÃEfÄ¬B˜e9q‚`©9b”+)èY]sPü\n{:`ÌiSÄçª[ZêÇlœĞQbHŸucKZâƒG/p";break;case"sv":$g="ÃB„C¨€æÃRÌ§!ø(J.™ À¢!”è 3°Ô°#I¸èeL†A²Dd0ˆ§€€Ìi6MÂàQ!†¶3œÎ’“¤ÀÙ:¥3£yÊbkB BS™\nhF˜L¥ÑÓqÌAÍ€¡€Äd3\rFÃqÀät7›ATSI:a6‰&ã<ğÂb2›&')¡HÊd¶ÂÌ7#q˜ßuÂ]D).hD‚š1Ë¤¤àr4ª6è\\ºo0\"ò³„¢?ŒÔ¡îñz™M\nggµÌf‰uéRh¤<#•ÿŒmõ­äw\rŠ7B'[m¦0ä\n*JL[îN^4kMÇhA¸È\n'šü±s5ç¡»˜Nu)ÔÜÈjÎÖ\$õ·ÌÜ¢Œ‰ ¬òŒÜ¼o*H©#²¦Ÿ”2òùJ@¦)êŒ—Ê«¿Œ)›’:O*êë¼O\$\"”C ò8!`Pœ:£lb\"41£rİµ£KÎ!#ªPé! ì…¼8Ê´¢ÌÃĞ·\r‰ëŒ8Î7#©ËH·Í:úãìŠğÁ1[&¡\r£p&&ïô5ÊÉJ:\nXÛ¦H¼©+K¤d< ÃÀ¤ƒò4 AC#ã˜50cpÊ5A b„0¹)»À›Èìbõ!ŠmóC(ÏÂ#œú3F\n:#% äóÀe ÙJ³º`Ñ)K5 HËT&Î¢¹#XÒ1l2×Ã`@É C\nÍ\"ãh4!uÚ¶»'EÛcM»oÚ# Êš\rÃªj\$Bhš\nb˜<ßƒÈ[…©\\×háÄÉ¦ÊöƒH¨¸àBê¶Îá‰êô„óD&\r*#¯(ºì‚“[7#0ÍÒM’PÎêR:Èb3>\r¨Ó+œd#˜Ø<Ür®7J¸í^É…Œñl9 å²‘7#l.’\r¨îiqfÚ^q1Z¨çŸhjA=èÒÎ‘¥i”ò¯j:yxËÈ¢\nÖ^)Pé¢®°’2ëãHßÛ	*n84c¦“hš†ñ9@ğ2h\$£°ê2?“un‹\\ÈùÂnÁp@%#CŠ3¡ĞÑ˜t…ã¿\\\$Z­\$¾(£8^™vãÂ>ªïÃp^)ğ’6	Œl0Aà^0‡Ø®ÆËBH3fí\n.ŒéiMİ‰NÓÂ<Ù4öĞƒoƒŸzÎç%*tÍÆ&R¦••h¥]Ğ8Ö´ÆÍ…šzÎ,—LéRgí¡·…^ÎúF®2%æ–ÃL\0/†%Ì1¤ ÇLI)A¦¤\0lc°9–’±V0²r•©t@¥Ôš&|Í <\\Ì™°Ò`šp7ËœÖ¤zÆÅ)†=Ì!Ä<Eˆº6/H…Ÿ,¢®àé2@YÃ“EÖŠ}¦¡“È«ÍŠO&	H0¦‚4!\rä(™‚\0¦»	I†A´:¡Š˜ó&ää‚âLì\"‰(Yê+¢.k[Æaí¹årâ[a«Á©Š“@Ôˆ#C#ä<4\"¤ÿCfXEÕ\r¬\$C#²3¤R‚Â@È)õB&)ú­sXù‰B\"\n<)…F|9¬•œ¢¹àšGVóÚs\\I©8Si8¡¬¤x–Ü¥²!\$¤™’ÇŸ3S\n!0’õ¬f‰HF\nAœ×ˆ©CÛ%Ò¹ò%Bˆ‚*j	ÌšÕ”ºŠ±ÛE¤Ò€¨àPQŒ7æÉA0Ç4M¥!Ä’ĞõÎ¶¡éì3ôD‘.%GLë¤q´REÜM\$\r€¬5 UÁØ¤P©Ë¾7¬ÉÏ4ù\"Èe‡¾—×NÍÀiT*Gq;J*w›ê(ÆGgº-0TMq˜³5W=XˆUj‰2hÃª”O°„+²ìkÉŠÄ•Á„bàI\n/Ä˜·ôbqLa9¥!ûBàr\rÑÒŸ*INß¥CMs’#L`Âdä:áM7ÌN‰©y%'¥BE¨İ^•vª£¬\\8KJ¥PñXÍ9ƒxváS…6Õeâ¹®š‡`»°êõWÕs†¡\0";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_†«•Ğô+ÁBQpÌÌ 9‚¢Ğt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êü¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	&°BÎá%0dB•‘ªBÊ³­(BÖ¶nK‚æ*Îªä9QÜÄB›À4Ã:¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n*Ã[È;Á\0Ê9Cxä¯³ü0oÈ7½ïŞ:\$\ná5O„à9óPÈàEÈŠ ˆ¯ŒR’ƒ´äZÄ©’\0éBnzŞéAêÄ¥¬J<>ãpæ4ãr€K)T¶±Bğ|%(D‹ëFF¸“\r,t©]T–jrõ¹°¢«DÉø¦:=KW-D4:\0´•È©]_¢4¤bçÂ-Ê,«W¨B¾G \rÃz‹Ä6ìO&ËrÌ¤Ê²pŞİñÕŠ€I‰´GÄÎ=´´:2½éF6JrùZÒ{<¹­î„CM,ös|Ÿ8Ê7£-Õ@×ìªZ6|†Y–ª¬L©×\"#s*Mãì«ğü/YC)JËiW±PãËjµ¡š_±°P*Î#•–¸D\$ıc)IJ•6şa+%’].«I‘m‡|\"–Ú£§GZ‡hõõ˜]XlTÒ‘ÕqUh²¸J2FWÛfF;~â–`-ìs­dù¸ò÷O ¡xHğÁ[•ÑÍ¾€d—²§­ñ­å›­ºº#yÁË=0_àñ\rïÍ±ìP¥ì›!^Ø ‚à¥½YêqR«Ë«_ÌÍo-\\æPÅ¡klx\$1s+éµÅ¯æ5Ìu“/=ç}mnB7¸v‹GmÜw]RÕŞö¹‡ª¸áÔzÄ…Û¯±)Ó~ÜCÜ·«·½qÛÿ§ñ,‹ó¶üÑnC6z©P€5ts@PH	\0è&„ĞtÂ˜\n†ĞÚÂØyƒAä.²Ô\"mŸšqŒ«ºõê’'‡ìÿÂş|Rf\rĞ´ñ)èb§ƒ* ª‰R*#€†È‹s`,mİ­àØ²\0QÛ;¡„9 Şƒ0lI”à0¢\"-% k3„g‹5a®1x€¨Á\ny)'\n¹Í …¤£ŠAŸz,n2ö9Ë|i'O¡ÓšnÎùac¬>AÅc—\$‚ñÄ·Ä'ùËè.]„'\nåÄJ[ÚSFÍr¯¶¢U™^	©Àû‡#ÌŸÔrnä8˜š Á\0<'z&†`zƒ@tÀ9ƒ ^Ã¼ÁÅ6Å4Öšƒ8/‡s*CÅJÁ€Á\$ÓÆ*ƒ <á„Bğ@ÅOÈonÊo†ÖxƒJ}Lá´0†èv±ïùïš\n¤Ú;))ëeú\"÷÷XûŒ’íåË‚¼Aâ!Œ:CĞ@ÏXlˆñÎ“Sn„3JTòÃïa˜:Ñ\"†ÒE! øĞ’@X¨ r¾w†ÂœURì%Hˆr¨C™»ÊIí…Nu™Q¼% ((€ R'´m„ªé3e2†‚Ób£szoÀPCT³º†\$€Î|O)ç='¬ö†VàÃt>í;'ŠnPÃ½n ô&&‚\né,Ãš~¤5ù2Ÿ™Ğƒ€uO²¡APóôédÅòæ‰ŸŠ\\ÃuN%x!…0¤ŠA³0Ê½¾>¯	Í+R\r`£&¦d‚4†JĞ7‰_³ámSıK3Lpºò|ê¹’¿¤4ùdÂ\r5­–Ò¶È‚÷DaHVÏç\\ØÅiŠBà’Å8Ü\\G%läÔ•'súã¿Ë’°Bg,.¥s‚%ë¸§/g7Šmà¹e¾¬¹ôŸsešV€(\$‘ğòw\0d\r-Àò'„â§ú>48‡SŞ2i\r € †I‹;¥5†L¡Œ¡§[]ñî8³²do!ñjÄroşè…\0Â¥êD5fC0ú\rˆ<ˆ§U(Ç¶ğËÕ…ì·Öçé _¯‘WµåŸ“™\0Í (j”3ÎC‘ö¡Ø*&ÖSÃQĞ\"ÒHC%P\\©”í¡”PA,Ã^L(„ÀA—aqê–a*TùÚÜI§O•ûa¢AS9ÀmPÄ[uÖÓ¤­¤h„EñŞd@DV\nXRzRòÜı.†`>¤x7{\$éËymßî Š£Q¿KäX(	'Ü6ÔtÍ®ş­º—9¼Ş}e\$^¹HÒzÙ™e9' ó]ãso•æ5Y°_VÊÖ¶ï[élb¹^şiÈÑ©bmFœÕŸñ³‹ 6¼HCk\n—;‚\0íMğµh›óˆ4†`ó£\nğF­“~Í'Š)a\0U\nƒˆe–ğRI+ÍÙl:#¦ngÖÒ¿ì¾á^…×®´Uq×ÎÅG:]·dsF½GlñU«Åò=Yed„‚»xö¹š•À:r8QÉgİäÙº{KcK±tÿ.\\2{Œ.jJTIH½×ä”¨y&Ì¤D½ˆ>Õcá‚nüßÏ\$E›¿A^~2xÓQfÅV«>\nA”6f%JÚ.J=€£Æ¶D®g€o¶ğn#B¼€,Bl3‘>_r½5]²óhïåÅÍ²„ÂˆÜjjNI»ÎùúÌÎ1ßštÏM·—˜A)£k¶ã#Çv=ßÉ‚:ë9Q\"qL¥ÅyÔå¾ÿ—ü÷Ì™¸Sî–†Vä—Ş÷ew41¸ò7Ö^Æ¤vî7‘|9'üí>wŸ ¢2/Ö¥]¿j[Ìo‹&4Øş¾“ñ:[Qı·ú¼Ï[À";break;case"th":$g="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Ş\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ğj65˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©7;ZÁá4	=j„¸´Ş.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0xè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$\rü6¹ÃĞ¼J±¶+šçº.º6»”Qó„Ÿ¨1ÚÚå`P¦ö#pÎ¬¢ª²P.åJVİ!ëó\0ğ0@Pª7\roˆî7(ä9\rã’°\"@`Â9½ã Şş>xèpá8Ïã„î9óˆÉ»iúØƒ+ÅÌÂ¿¶)Ã¤Œ6MJÔŸ¥1lY\$ºO*U @¤ÅÅ,ÇÓ£šœ8nƒx\\5²T(¢6/\n5’Œ8ç» ©BNÍH\\I1rlãH¼àÃ”ÄY;rò|¬¨ÕŒIMä&€‹3I £hğ§¤Ë_ÈQÒB1£·,Ûnm1,µÈ;›,«dƒµE„;˜€&iüdÇà(UZÙb­§©!N’ªÌTÚE‰Ü^±º«„›»m†0´A÷\r”ä»nB,å]÷*;\\“IÌwB¬§õÜ9X\\5o}aS{X,î’BÒ ¯Öˆg%'¨å¹‹®ú\"á£ÇPÓƒ,ÅŠªg(Èî’íê+ívë\$#\"LåCIr¢/àøA j„ğ«(b®×wÍ¾ºDÎÚ4é`ZbìÙ`\\iëlœÜé|„•ŠÊ™Ë[Ší:®ìˆŞ,°±d0ïØÎjvÊ«8gN\\gNî¨¸ºŠu‡«¼¥T¸q1ijÃí]GÕ äeSÉU_tÑüÆSÙîúº®ØÄH\$	Ğš&‡B˜§xIÊì)cÍô¨P^-µeÁj.ôyzã%vxÍÄ±B\$?5ğ@œShn‡¼Ä?ğäÿƒ(x@¡¸9†ßyäT­AÑÀè€Qè=A„9ğŞƒ0lJ¡”âœÑP–âÒHí¼ï¼Öšp”i\0ihÜ•—˜’sa†fın÷²PÓRdn5f<ò°Ïä\rê¥³´ÄXOVIˆ¦ÄSª˜bá,jmµ4SÖI¶\\ÀŞ\$XãÛ6êä¬Ôî`:†j!E&ĞğLQ`€×C0=A :@àÁĞ/áŞFàÂl#NIÄ3‚ğÊ¤´\n’ñ*L#‚Hmä6ÉpèxaÏúR pŞÚø \r¡„5ğÒ¡St³\rÒ™è¬sPsVÊ*¬Ñ\\˜ A#œ\rÅ`*ƒŞCt™@€;Ÿ€Øï	¸3'JÚƒf\n\0:†0ÇC0ušá°7†t«5%¸h?Ó9@Jz”Á¤0†Å~íLÒ9èiå…Zâ•‚œ'T\0ë+7Ah:Ü¡\$¡Y•¶€H\n\0€€Rª_pVô¶S¹×3]%Lª•pà|»š)T3Ÿãä}±ø?A•µ(0äê	O©ş~ÎÀïO&dÎƒ ‚¡Gàæ¡§=LMˆ[ààT*‡Q!Éµtç”‘òl ièÃuO•‚6wÕÒ³Š\0€!…0¤›[:O!)|ªh)á~ªÍ¶hÊÂ}}Hî6:Öœ\\è;»YI’ÉÇ7EœqaS©dª¬DXWKav8FÁ0¸vVsNÛŸŠÍ…G“•¸‘;Œè]_€’ICÉé4¶£âŸÓÀn– şÁĞâOâÉÀ6‚\0ƒ\$\$”ó’óâv'‰çP”1ûAö\rØWù+ˆqNÎ’X’¶WIìÃ)\"à»e¹jHR©&v¶É^T–@³kHtPé\nZˆ¬¹s½4±1Òÿ«k–²JàÇB¬Vƒ5­ª„óÛªĞ›ì‘à‚? ÓMB˜Q	€€3S @}ãğF\n”l0Ü*™(”%L¹W1@&ãÜœ™ÂH‚ŠÆ¾/8y¢¢[\$ı!¬†@Ütqµõ²Å4‚°	|l1CŠ7ıÎEûVWõçd²v©ÉMŒñßŒ°Ó{¢ˆKµ,“ÊÉÛW¡†ÀVác\rwè€úŞüÎ3**em¿Ò°±0m­IşlÕ @B F â\0†9_M\nÀ%x'&©Œz\\óIÍ¼™w8ÊD]é+a(+qÒöC™N¨&t´İ.ƒÎ_.ç!¯ª8†(›éİ¾ÊÁÈœô8WDÃÅ7L¥q¢„ÀËŠYS§…¿<dK ™f|9Ì¾3>Ü‰&\"¼,Á—\nVûˆ©X	¿\r†ÔâS¨\nİr>š•v\r£‚,l1XYlsA•›&­¥µ½:”ƒ)ùš4ğ¬¡G#	Íˆ³+6¡r²WuA6.	¿Gk“	]84˜ò®»ï¬v^f À(";break;case"tr":$g="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥Ğßv§‡K…Ês¼ŒfSd†˜kXjyaäÊt5ÁÏXlFó:´Ú‰i–£x½²Æ\\õFša6ˆ3ú¬²]7›F	¸Óº¿™AE=é”É 4É\\¹KªK:åL&àQTÜk7Îğ8ñÊKH0ãFºfe9ˆ<8S™Ôàp’áNÃ™ŞJ2\$ê(@:NØèŸ\rƒ\n„ŸŒÚl4£î0@5»0J€Ÿ©	¢/‰Š¦©ã¢„îS°íBã†:/’B¹l-ĞPÒ45¡\n6»iA`ĞƒH ª`P2ê`éHìÚ<ƒ4mÛ ³@3¦úî¼¯m Ò1ÈQ<,ŸEEˆ(AC|#BJÊÄ¦.8Ğô¨3X³8Âq‘bÔ„£\"lÁ€Lû?-JšİÎlbé„°\\”xc!¸`PĞÍò°äº#Èë– ­ƒ&\r(R”¬¬³–2³kèZüldŒ#ˆòbÕ8#ªúäºb=hºtËW¢Œc Ø	PSğÂÖXu…ŒŒÙ	xÙeK-Jç¹b˜t\"Ğæˆ‹cÍÌ<‹¡hÂ0…£8Î\nÉz!Vî°æÆµĞJİ\r×ÂˆøßpÊ<C£rài=IX²ˆğ6I`Q†C©¨øÚ2'Ë*|9§Ğ¸ô“Šc¨Ü:©ø‘Ÿ\rxÊÍ‰°á\0Ì0PH@7§cêÜŒ,ÜxÛ\rÉàã¢Ã„Œ6e\"8ƒHÖ‹n†C£[‡M£¹èòÑ\$â~k›Ïë,Ÿ9–šÙ;z&³­·#œ[Ÿª3PÈ:…\0Ø¼ƒ4=¨êhÄÚ²®ƒ…HwèAmÃ”âíEçƒm¶¸êÙ2(sTy,Ë6–ˆ¸ÑÃÁèD4ƒ à9‡Ax^;õu€ç©2J3…ék‚&88Ü„J(})‰ß‘‡xÂBp«·ìã®lÜ£¸b¦ã³î.f6Gœ™c¢\$ÑõR‘n,/	Ô²¤6K{¢ë¤ş¾Xì(¾içk™ÉO¡åg§\"ñ(ä“Ie‰´™0×\0ŞèU@¡¹¹’êDƒQ\$,ô…\0D€o©Z0PQAH RæmMr˜SŠR*°“„ò‚Ãlei?•4-O‘‡1ˆ%¸#×\rÚ<&¤ –â>ö‰ç-Á¡[“âÓÙ“3\$:DÈ¦\nû\\gø9'àî¥Ã8 !Òc]Mt1§´“¤ÑN“È@ )… CQŸW.@#PÚbÃ+RAFírRJÈF&²öbEÕˆON`4,V¹>r1º7b€¡Qƒ‡@ØzIÌTNC¯LÈìğ'j«Z‡'‚tOiÆ4aˆ/pòËÔRy?p47vX•KÀy/`(ğ¦\ri ÍÆE5y*Xƒo¥D‹ # æQ#È”ƒ! êC;\"zè(â7Öş…ãÌA*A‚H';2S&e õ6ÂˆLm¥*JL¡xrLòVH*lßŸVFSĞiS¸âÃ‡B„å!œÓB tài£‰èÂ‘‘xdŒ¤[u=°#“HP\n~ij(Â½Y²Öl•5”ÎSjUHŒJ6ÅMyB¤Ü'àA—sFp›^ÏA\0CIa°ÀÒş¦)C@€*…@ŒAÂ\rá‘¹v:ƒ^»Ù'Ïr˜§šiR×•}òe¢Ó•gëu¢d~JÀzæÙ‘©q.gµÍ›5¸*q²9Al#ÒRK*@aÁ’Ä—Àˆj%|¨Ğ	T¥0K,¢\\±E2‰ønÆØéCBˆ¢y4„æË™ƒ2‘EÒe—À³mS‰ÒF2ıQ62Ü^J¹Uª'ºíNé\"«°«p%†ğàE“XDeO¾V×ã¦JRu|7ZÀ—(yZ-œì»¡¼ŞSHyoÜQx¨eRÎ ";break;case"uk":$g="ĞI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”CˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌĞÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZk€Àé7*¦M)4â/ñ55”CBµh¥à´¹æ	 †È ÒHT6\\›hîœt¾vc ’lüV¾–ƒ¡Y…j¦ˆ×¶‰øÔ®pNUf@¦;I“fù«\r:bÕib’ï¾¦ƒÜü’jˆ iš%l»ôh%.Ê\n§Á°{à™;¨y×\$­CC Ië,•#DôÄ–\r£5·ĞŠX?ŠjªĞ²¥‚ÖH¦)Lxİ¦(kfB®Køç‰{–ª)æ‰)Æ¯óªFHm\\¢F ‰\$j¡H!d*’²¬B²ÙÂéƒ´Õ—.C¯\$.)D\næ‰™ÄlbÌ9­kjÄ·«ª\\»´­ÌÊ¾†D’¡Òå¶\rZ\rîqdéš…1#D£&Ï?l‹&@Ô1Á M1Ä\\÷¡É`hr@:¼®Äíªş¦,¼¶‡’Î¢[\nCä*›(m,•¨r¼L„×JÁ4»\"ìœ´£ˆÑGUN/¸˜—;s?K«¡®„s3ªÉBcH¨(˜È‚4^„·ÜœÃ~Õr“}MÃt%Ä°¡pHâÁÎÄ\r^Á2ø[\$¨ÑCkJVÍGš“A\\D[sP×‘B¦XÆhŠ£Ò65Ò„Ô©©\$cõÿ•Ñ—šW(®”şWF’-^&éô+B–©X{7Ç1óŸ™áp´êÊR“¬ê:Ú’“ëÈ;-(lNæÉ³mN¯µ·zÔÅ·¬ØUGHöìÆ-r4iV†&/#Èdå\n4¦sŠ^Âİv@sâîm«1¬	\$Xøˆ4cÄ6³ø@7A\0Ê7uİ‡eÚvC(ğ:vã˜Ò7ÔM¹M˜tZ6ƒ–lë¦ûrt^­y=`ƒ=ıË–:Zæ³7_>V“¸h\\Tôš2bë`\$Œ+ôÙjx\\‚dÿfA„¦\$;¹¬µ5`B…»&Ë)a’ìŞë|J/´GLÚ‹‹æ&/¡õ'ìû–KñY¯Ğ§%¦p‚^Ûúmè}ş™'ş‡ ğ€¤•%@„’L`[jaÍñ¤ÒAŸ93‚°t¦Áƒš²ûòƒ]8'\$9Îl%>è\0µèTI`3ÔyğH¢¶¥„œSÙéNÅÕ6ƒŠ.©÷^Z#­œKŒ‘SLEDF&gî—Ó\n§yBÁ3)cœNš‚RLN.:S×²‰%­G«¸o…éK+§•°”ÛÒÁ‰\$ğEòìoÁ\0< €4 Êè\"\rĞ:\0æx/ò¬ÈCHn¡È;@Îİ¼¸wïá†à^‹8>˜…SœaÈ€¼0ƒâ®	¡ÿOñÔDÃÒQ\$˜,8DèCGÈaÔ©¾ze0®ù×Í“2X¬\r£¢RA¤™b%¬ã—I+Ù\"g*jµCšÃæTd©Êm²P›,WSÚ›Ï¾ 7ÒË\n])R‡À¥È ¶Ng ç*Õ„UV1I*eTµ£s96Ê{6iô£‘£|ÒÓ¬(\n (ÚP“äò(à€pS5Uoªé5ÑA¢#£Õ\0ÔÅ\0-†ä\\KXŸn†T£TˆLÙ¤ßJg4ß7i¸‚’Sékêí]0µìgÖ±M‚'dµŠ:İñ\\¡ä!,´T(•’|9Âî:›¥ªæyŠIÓ±Ó¬g[}G¤¦;—T•`S\nAó4‰äüÍ«l§º+¤ÀôSU&ÓT¹8±o=‚7PÑC¡‹¨Œ\\\r¬‚Õ†oT¬{©©´ÕŠÂ“”“SVaª²vÖËªe^Ìâ®”tôWlò-b½‡\rªù¼6¬vÅ¿Å¡¢!ˆqWŒ¯ —§`ƒ+åŒ³ÉêÔXBxj96‘éª3İUšĞàTÑLä*WûÄûWR¢€€(ğ¦*·ö`é3\\ÇlíÇÀ	XªJĞù	MÌKw?Çºèâæ…D:”¬‡-KvK=µ­OD© †rx‰À&§%s`ïb—!æÄ‘M«öŠŞRõz*]‚\0¦Ba6„ÈB\0„`¨2<9Äzp:tÊ |Û)´..ãö¡ì^êy~6›°Š`œò#ùˆ•¯™[Ój+wÕ‹ìÙy)~íí0Ó·š³±¸¦‡%I  ãÍÍãA·¼ç¡ó®‰½™¸hÌÌ½¤;å;:K1ÅÖOÍ\r€­åYÇ”ÄcÓX&N«êïuĞv˜¾¸ùUå¼ÖF”µÈ·tÖ¼à†Å–*ˆ9bu\0ª0-ò':t…ÖpĞ…ÌâåY£X3[7? í&¯”î\rdEís;m¥w·-¶ÁÏe+pmdİ¶4\n¾Æ„ÊO	ôéQ`o Ñ¯!¡ƒu™´0÷É¹4ø^K·ñÒK¨İ–š„RŸÌ°à¼«CDŸãø°s‚îps­u¦´GÓ5…]üpÚßów¿è—cÂgÉm%!b<­\$°ÜlÙ4ÑWz ‘£#Úâ ŠäÆ­sŒñ/_[m\$4Í³”Yéê(Ş)§FÎ*ÄZšK­¥Ì4­Õ‚Ì A«Á•;\"–jdhT1íòê\"ßG Ñ.±\nF”}hßŒÎaõKªÂÀP";break;case"vi":$g="Bp®”&á†³‚š *ó(J.™„0Q,ĞÃZŒâ¤)vƒ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XŞ8@q:g!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ğ›­Àƒ}FÊÍ¼S06ÂÁ½†¡Œ÷\\İÅv¯ëàÄN5°ªn5›çx!”är7œ¥ÄC	ĞÂ1#˜Êõã(æÍã¢&:ƒóæ;¿#\"\\! %:8!KÚHÈ+°Úœ0RĞ7±®úwC(\$F]“áÒ]“+°æ0¡Ò9©jjP ˜eî„Fdš²c@êœãJ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹Âñ”È@3Êè&È!\0Úï3ZŒì0ß9Ê¤ŒHÃ(©\"Ÿ;¯mhÃ#ˆCJV« %há>%*lœ°ù‡Î¢m)è	RÜ˜„ˆA¯°íòƒ, Óõ\r”Eñ*iH\$“@Â70ÌCŒ‹Èò:¡@æLpÑª PH…¡ gd†³áXén	~Å/E,1§Lòa”MË]é@ğêÑu*pM¤ê	\n,³<ÄàÊÅS²º†™'HAyĞcdÇG—tŒÎÁÉÒJpSŞÙS©…Ş5˜eC#àˆur¦ÖÜ„ó²8Ñ(ôB±v	Ğš&‡B˜¦cÎ\\<‹¡hÚ6…£ È›ÖÊ²ìÈ\"\r1¸Ä6@j@@üßcsÿ¢Gz8å¦Œ£Åx7cLQgõšf9ÅC@6-\0P²7³Cåã0Ì6;c*]635ğ]”õ«¼PŒüæ¸eª'A£“èA?­í8êï³xûVÍ\r‘hX\"åÌ½\\j±¿³UÀAeÔ72£\n]†ÈHîï@Î—\nı¢›´¦§r…—ã§ÈÌÕE@ÙÔIG,PÈô±tVÓí7r¬u%¡\0x¡8Ì„C@è:˜t…ã¿Ä# Û¶¿OÈÎŒ£wÙ©}º¬P„J@|Ã½H1B™vhxÃ>a\$43Å°˜XJX\r]¹´:HËÊ—\"hùÕj€ÃcX‚pÒay@aÀûcòC*¹!™^4ğæCc‚˜:ÂØÓD\r\$tš 4o\n+g¶\r†ØÖ¡QHp:¢ôbŒÑªu4ğ»Š€…Ğ·AA@\$h´ŒÑäq¤\"dÑÚE¸2Á£¶T£@pA¤í4@Ï\n\\Ú@í ¨\rÃ¼))a û 8øPÃš†@€íÃÙƒ€uBI\n%rØûü|áíB)ÑÂméµh“tËACaL)fş]ÚALÉeU’”æIPfi‹¡VdÒANYE4Õ°.ÑU%I[à@\n!Î`@Rrº[ÙjŒŒ\0N—cŠOÓÊ÷\rÄ‹Š“ˆ~\$ARæSKÂ/ÁI.	\$H<¶CÖUÉòAH71v>Û9¨@È(3ƒ¦_3è‡¤1ÃtĞ:çí6Ã2HPñD%€¼(ğ¦3ˆq¤åè®×\$™Î£ZÁş1‚nNIÙÅ'³Œ€‹zc2È)±„aŠÅŞ\nQ&dOÏôhb[”#ôbS'„ëÑvÁR/÷-N|hcP‘2pŒOa–¢Äš`0Á ›]Ißtu3KYhñÃ¥kM§DÄ”‚\\æ‘dÈ Øšz…Ø•Há9ŠRËD!ªËUÙúPâBW€uxå:#¢eMîİ»Át,LjJSD*…@ŒAÅrHU¾b‚SÖdLd–\$Íâ<HÃ:¬,ö²›* ){:fR½\0 ¢U›Í\$À(äœ°ˆ¤ËëŸf¾É‘ÚüÂl«¶D]ˆ³6QM«8gUÒáÛ&|§U™³Nj.T–ÀÆ’Ó\nN\n‡xPBÜÎpÄˆ‡ s d“«b5ZŠµ9TXXIbék‚àŞQ¹\n”õh-+Êyíà‡JS Ò¢«<lª> LF×à\0";break;case"zh":$g="æA*ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ğ S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ğ€Js!J¥“É:Ú2r«STâ¢”\n†Ìh5\rÇSRº9QÉ÷*-Y(eÈ—B†­+²¯Î…òFZI9PªYj^F•X9‘ªê¼Pæ¸ÜÜÉÔ¥2s&Ö’Eƒ¡~™Œª®·yc‘~¨¦#}K•r¶s®Ôûkõ|¿iµ-rÙÍ€Á)c(¸ÊC«İ¦#*ÛJ!A–R\nõk¡P€Œ/Wît¢¢ZœU9ÓêWJQ3ÓWãq¨*é'Os%îdbÊ¯C9Ô¿Mnr;NáPÁ)ÅÁZâ´'1Tœ¥‰*†J;’©§)nY5ªª®¨’ç9XS#%’ÊîœÄAns–%ÙÊO-ç30¥*\\OœÄ¹lt’å¢0]Œñ6r‘²Ê^’-‰8´å\0Jœ¤Ù|r—¥\nÃ‘)V½Š»l½¯§)2ï@Q)n„‘«Kğı+)3¤«ú'<×(MÌáÊ]—QsÅ¡ã AR–LëI SA b¥¤8s–’’N]œÄ\"†^‘§9zW%¤s]î‘AÉ±ÑÊEtIÌE•1j¨’IW)©i:R9TŒÙÒQ5L±	^œ¤y#XM!,ü 5ÕxŸBöm@?‹ÁÎG\n£¼\$	Ğš&‡B˜¦cÍÜ<‹¡pÚ6…Ã ÈV•i==‹)M8»ª0æD¤²WÀXDØTAĞÙK´`PØ:Ijs”ÅÙÎ]ç!tC1¤â E2ôÁ9ëDå6I…!bt‘‘X¹1ñ˜“HdzW–ê5¦DÇI\$¶qÒC£ey*Æ‘…VOåò±t«¤\$Ó¦ÔBùÔgŸ?ÚYÎj³n±b¾ïË÷Zñ8O©AàÂ\rÊ3¡Ğ:ƒ€æáxïÁ…ÃÈ6#pÊ9Ãxä3…ã(İÈ§\$9#&(áóı‡Á¤¨xŒ!öK'1fJ¦Ğa\\AœÅpr\$)ÊFĞÙ~B%THaî³­¾/›êÆ•¥!ÌI‘µr‚C\\Q.¤Eğ¶îœäÙp„‘‰É	+K^Ë&i0QNº‘Œk\"NVP_B¸._g‹8{Á\0 \$\n'İY¾	PCAG!‚%³•hM…ÁÃ˜G\nT€,8‰u&PsŠ±^³E %ğIœ¼ÚSAË.h \\Î9…\0¼l}ş‘Áz9”!÷‹Z#\\±ÄÄ-i4PÓ‹„@ aL)`@IÅ\$}\$­°´Äì³–£¢5§—Ğ-„+n&ÈÁRoÅh—Â¸Z§¦–#ÊQş¢ˆO*±@ÀØ¦C˜O	ÃoLƒñ\$œGâ\\ZÚŠ-\0sØ‚há,<—z-GHE\\(ğ¦!ë1dÄUøÓ\"D8(\"E~¶\n:¶‘¹…‘\n§Tøå\$x]ŠH4€Äx¯\$ç@5¡~!Â0T\n|Š~ŠÄXS\n!0¦ã_	s'e)~6¶NqĞw¢åì˜ÂğÛÉ›ÂÂmÍÙ®,ù0s”MŠä\$^”G„³°‚ˆñ/Ò€±¯0ÆˆÈö/DxCc°ŞÅ4˜!ÔÀŸ„rˆf/ÄÛè4Â¸ø‹”&OE°åwnô]½dB F á-¦‚¯<_Clš¦Âåò¬ÅIÓXØÕÑA(.WÀ™*\n´ˆQf:”4ÅÈ@¨T¶nË× FÜ¾‘&/ aÂôØ\\Ó*/ØŠ ^Âó4Ï%* Õp eğ(d„’;äÁ¤’Ñ ™±qÑ#ÒB#J_',´ŠB S0¼jÖà–’ªhá’R‚Š°*húÕ5¢¨¡\"À";break;case"zh-tw":$g="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÂ:\$\ns¡.ešUÈ¸E9PK72©(æP¢h)Ê…@º:i	%“Êcè§Je åR)Ü«{º	Nd TâPˆ£\\ªÔÃ•8¨CˆÈf4†ãÌaS@/%Èäû•N‹¦¬’Ndâ%Ğ³C¹’É—B…Q+–¹Öê‡Bñ_MK,ª\$õÆçu»ŞowÔfš‚T9®WK´ÍÊW¹•ˆ§2mizX:P	—*‘½_/Ùg*eSLK¶Ûˆú™Î¹^9×HÌ\rºÛÕ7ºŒZz>‹ êÔ0)È¿Nï\nÙr!U=R\n¤ôÉÖ^¯ÜéJÅÑTçO©](ÅI–Ø^Ü«¥]EÌJ4\$yhr•ä2^?[ ô½eCr‘º^[#åk¢Ö‘g1'¤)ÌT'9jB)#›,§%')näªª»hV’èùdô=OaĞ@§IBO¤òàs¥Â¦K©¤¹Jºç12A\$±&ë8mQd€¨ÁlY»r—%ò\0J£Ô€D&©¹HiË8¬)^r“*ÁÊ\\gA2‡@1DµäÉv—”ªi`\\…É>Ïä-æ1‡IAC“er2ò:¡@æ©¤Ä¶HÀPH…Á gR†ªi N(kÈ]—g1GÊ‡9{IÄq\$ı‘àRzŸ éq¤å|@—Ñ_sùZH\$kW–Î±|C9Të‰.¬'¤%¨—ä!ÊC—ItW\\×B“J(d\r£i—e´ØG—Ê²°\$	Ğš&‡B˜¦cÎ<‹¡pÚ6…Ã ÉcÙ\$™ü“(ÁL@Á±(@s±ÊJ“øÊ•ã¸Ô5CÑDB6Šú¬\rƒ äË•I6Q0DÑÈ]Ì±È^K¢¥8£õÏtÑÌR2.Ñ#r	Ò@‘Ê4†‡Dw„t’\n©|F\$9t%4ND'äVC£]°¦2c˜Ò7ÚìW©‘ÒF±­{)ÔQ}nÏ0<TYo’C\0!\0Ğ9£0z\r è8aĞ^ı\\0ŒƒhÒ7£\\7C8^2İxñL\rÛ¶ğ„JP}Àdç)bJ‡xÂdÄ±r§A\\I ÄÍAĞ¤)ÊFÛ–éÛo')”AĞQxşBöDåiI\r¨XX÷Ö9¶“èjTäÜ„H8‰±Í3ÃDÖ’#3c¢|[™DØ˜Ù/e(…˜ã8«ÅÚ_?èZ&P@@Pcp%¡ø!`ˆ)D15’Å¸T‰2&¨Q«‘J„€ç/ÑÀ1@‰ÌÁ…HJ)2¸”ö…`x¸`s–qÌ(ãX5F°Ğ/G2(b9l 1*#ÑÓù\\Å°r‰¸o	ˆËQL„Ø0¦‚0 ¼5»\0à„\"ğÕü9D°®?ÙµB^LIœ=F˜WT€.)EBr!”Z‚	c€9£”E\nJm0‚ÂxNc0rÌÙu¢øOJéİJ}‚\0˜ ¡Ì,DAC¤K‰Äš\"G3æQËÈNŠ#,xS\n€ŠTP9€ÂàM”4Ğ^\r‹ÈİéÉ)%™e&B´ƒ‚ÓAŸê¼ù4ß0T\nì‘9DXS\n!0œÙFsšBN„X5U~KŒQïÔW8·¾øNñà]BÈÒšs£”„z„Î-F	ê!A\$¼&«À×Qu\"gĞˆ1Bö‰ñ~‰Ä`‰ <!³ ØréIÑ9ã˜O“ó]#Ò‘”:â¸ÿ‹”NIÓÜ*0öP¨h88¨Ú.³è äŒ	ˆµ6\"ÄèeçX_ÓÁ(.Uğ™*BU\0PÔÄôËjrZ	ÁĞ L:m8ïÉ×!_‹^ÓÓğ/J€¡­YŠ+\0 ª¾¦ÈÉF#Œ»)¢\$@Êó&Ö5˜‚„FPº­bG@¤bbŒ^’êº-2oQD¸«ÌSø9•Z­<S@É—ãÅg\$=\\«Âå#Ä|";break;}$yg=array();foreach(explode("\n",lzw_decompress($g))as$X)$yg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$yg;}if(!$yg){$yg=get_translations($ba);$_SESSION["translations"]=$yg;}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$Oe=array_search("SQL",$b->operators);if($Oe!==false)unset($b->operators[$Oe]);}function
dsn($Pb,$V,$E,$C=array()){$C[PDO::ATTR_ERRMODE]=PDO::ERRMODE_SILENT;$C[PDO::ATTR_STATEMENT_CLASS]=array('Min_PDOStatement');try{$this->pdo=new
PDO($Pb,$V,$E,$C);}catch(Exception$ec){auth_error(h($ec->getMessage()));}$this->server_info=@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);}function
quote($P){return$this->pdo->quote($P);}function
query($F,$Fg=false){$G=$this->pdo->query($F);$this->error="";if(!$G){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($G);return$G;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($G=null){if(!$G){$G=$this->_result;if(!$G)return
false;}if($G->columnCount()){$G->num_rows=$G->rowCount();return$G;}$this->affected_rows=$G->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch();return$I[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(PDO::FETCH_ASSOC);}function
fetch_row(){return$this->fetch(PDO::FETCH_NUM);}function
fetch_field(){$I=(object)$this->getColumnMeta($this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=(in_array("blob",(array)$I->flags)?63:0);return$I;}}}$Mb=array();function
add_driver($t,$B){global$Mb;$Mb[$t]=$B;}function
get_driver($t){global$Mb;return$Mb[$t];}class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($Q,$K,$Z,$Jc,$ue=array(),$z=1,$D=0,$Te=false){global$b,$x;$pd=(count($Jc)<count($K));$F=$b->selectQueryBuild($K,$Z,$Jc,$ue,$z,$D);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$Jc&&$pd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$K)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Jc&&$pd?"\nGROUP BY ".implode(", ",$Jc):"").($ue?"\nORDER BY ".implode(", ",$ue):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Sf=microtime(true);$H=$this->_conn->query($F);if($Te)echo$b->selectQuery($F,$Sf,!$H);return$H;}function
delete($Q,$af,$z=0){$F="FROM ".table($Q);return
queries("DELETE".($z?limit1($Q,$F,$af):" $F$af"));}function
update($Q,$N,$af,$z=0,$L="\n"){$Tg=array();foreach($N
as$y=>$X)$Tg[]="$y = $X";$F=table($Q)." SET$L".implode(",$L",$Tg);return
queries("UPDATE".($z?limit1($Q,$F,$af,$L):" $F$af"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$J,$Re){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$mg){}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($tf){return
q($tf);}function
warnings(){return'';}function
tableHelp($B){}}$Mb["sqlite"]="SQLite 3";$Mb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Vg=$this->_link->version();$this->server_info=$Vg["versionString"];}function
query($F){$G=@$this->_link->query($F);$this->error="";if(!$G){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($G->numColumns())return
new
Min_Result($G);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetchArray();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($F,$Fg=false){$Wd=($Fg?"unbufferedQuery":"query");$G=@$this->_link->$Wd($F,SQLITE_BOTH,$n);$this->error="";if(!$G){$this->error=$n;return
false;}elseif($G===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($G);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetch();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;if(method_exists($G,'numRows'))$this->num_rows=$G->numRows();}function
fetch_assoc(){$I=$this->_result->fetch(SQLITE_ASSOC);if(!$I)return
false;$H=array();foreach($I
as$y=>$X)$H[idf_unescape($y)]=$X;return$H;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$Je='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Je\\.)?$Je\$~",$B,$A)){$Q=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Re){$Tg=array();foreach($J
as$N)$Tg[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($J))).") VALUES\n".implode(",\n",$Tg));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$z,$ie=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($ie?" OFFSET $ie":""):"");}function
limit1($Q,$F,$Z,$L="\n"){global$h;return(preg_match('~^INTO~',$F)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$L):" $F WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$L."LIMIT 1)");}function
db_collation($l,$bb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($B=""){global$h;$H=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){$I["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($I["Name"]));$H[$I["Name"]]=$I;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$I)$H[$I["name"]]["Auto_increment"]=$I["seq"];return($B!=""?$H[$B]:$H);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$h;$H=array();$Re="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$I){$B=$I["name"];$T=strtolower($I["type"]);$Db=$I["dflt_value"];$H[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Db,$A)?str_replace("''","'",$A[1]):($Db=="NULL"?null:$Db)),"null"=>!$I["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$I["pk"],);if($I["pk"]){if($Re!="")$H[$Re]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$H[$B]["auto_increment"]=true;$Re=$B;}}$Pf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Pf,$Od,PREG_SET_ORDER);foreach($Od
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($H[$B])$H[$B]["collation"]=trim($A[3],"'");}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$Pf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Pf,$A)){$H[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Od,PREG_SET_ORDER);foreach($Od
as$A){$H[""]["columns"][]=idf_unescape($A[2]).$A[4];$H[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$H){foreach(fields($Q)as$B=>$o){if($o["primary"])$H[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$Qf=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$i);foreach(get_rows("PRAGMA index_list(".table($Q).")",$i)as$I){$B=$I["name"];$v=array("type"=>($I["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$i)as$sf){$v["columns"][]=$sf["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Qf[$B],$gf)){preg_match_all('/("[^"]*+")+( DESC)?/',$gf[2],$Od);foreach($Od[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$H[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$H[""]["columns"]||$v["descs"]!=$H[""]["descs"]||!preg_match("~^sqlite_~",$B))$H[$B]=$v;}return$H;}function
foreign_keys($Q){$H=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$I){$Cc=&$H[$I["id"]];if(!$Cc)$Cc=$I;$Cc["source"][]=$I["from"];$Cc["target"][]=$I["to"];}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($B){global$h;$kc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($kc)\$~",$B)){$h->error=lang(23,str_replace("|",", ",$kc));return
false;}return
true;}function
create_database($l,$d){global$h;if(file_exists($l)){$h->error=lang(24);return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$ec){$h->error=$ec->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$h;$h->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($B,$d){global$h;if(!check_sqlite_name($B))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){global$h;$Pg=($Q==""||$_c);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Pg=true;break;}}$c=array();$ze=array();foreach($p
as$o){if($o[1]){$c[]=($Pg?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$ze[$o[0]]=$o[1][0];}}if(!$Pg){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$B&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($Q,$B,$c,$ze,$_c,$Ea))return
false;if($Ea){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($B).", $Ea)");queries("COMMIT");}return
true;}function
recreate_table($Q,$B,$p,$ze,$_c,$Ea,$w=array()){global$h;if($Q!=""){if(!$p){foreach(fields($Q)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$ze[$y]=idf_escape($y);}}$Se=false;foreach($p
as$o){if($o[6])$Se=true;}$Ob=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Ob[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$td=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$ze[$e])continue
2;$f[]=$ze[$e].($v["descs"][$y]?" DESC":"");}if(!$Ob[$td]){if($v["type"]!="PRIMARY"||!$Se)$w[]=array($v["type"],$td,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$_c[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$td=>$Cc){foreach($Cc["source"]as$y=>$e){if(!$ze[$e])continue
2;$Cc["source"][$y]=idf_unescape($ze[$e]);}if(!isset($_c[" $td"]))$_c[]=" ".format_foreign_key($Cc);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($_c));$gg=($Q==$B?"adminer_$B":$B);if(!queries("CREATE TABLE ".table($gg)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($ze&&!queries("INSERT INTO ".table($gg)." (".implode(", ",$ze).") SELECT ".implode(", ",array_map('idf_escape',array_keys($ze)))." FROM ".table($Q)))return
false;$Dg=array();foreach(triggers($Q)as$Bg=>$ng){$Ag=trigger($Bg);$Dg[]="CREATE TRIGGER ".idf_escape($Bg)." ".implode(" ",$ng)." ON ".table($B)."\n$Ag[Statement]";}$Ea=$Ea?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$B&&!queries("ALTER TABLE ".table($gg)." RENAME TO ".table($B)))||!alter_indexes($B,$w))return
false;if($Ea)queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));foreach($Dg
as$Ag){if(!queries($Ag))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$B,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$Re){if($Re[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Xg){return
apply_queries("DROP VIEW",$Xg);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Xg,$fg){return
false;}function
trigger($B){global$h;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Cg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Cg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$he=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($he?" OF":""),"Of"=>idf_unescape($he),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($Q){$H=array();$Cg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$I){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Cg["Timing"]).')\s*(.*?)\s+ON\b~i',$I["sql"],$A);$H[$I["name"]]=array($A[1],$A[2]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$F){return$h->query("EXPLAIN QUERY PLAN $F");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($vf){return
true;}function
create_sql($Q,$Ea,$Wf){global$h;$H=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$B=>$v){if($B=='')continue;$H.=";\n\n".index_sql($Q,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$H;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$h;$H=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$H[$y]=$h->result("PRAGMA $y");return$H;}function
show_status(){$H=array();foreach(get_vals("PRAGMA compile_options")as$se){list($y,$X)=explode("=",$se,2);$H[$y]=$X;}return$H;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$oc);}function
driver_config(){$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);return
array('possible_drivers'=>array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite"),'jush'=>"sqlite",'types'=>$U,'structured_types'=>array_keys($U),'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL"),'functions'=>array("distinct","hex","length","lower","round","unixepoch","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",)),);}}$Mb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($bc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Vg=pg_version($this->_link);$this->server_info=$Vg["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"&&$X!==null?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$H=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($H)$this->_link=$H;return$H;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Fg=false){$G=@pg_query($this->_link,$F);$this->error="";if(!$G){$this->error=pg_last_error($this->_link);$H=false;}elseif(!pg_num_fields($G)){$this->affected_rows=pg_affected_rows($G);$H=true;}else$H=new
Min_Result($G);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
pg_fetch_result($G->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=pg_num_rows($G);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if(function_exists('pg_field_table'))$H->orgtable=pg_field_table($this->_result,$e);$H->name=pg_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=pg_field_type($this->_result,$e);$H->charsetnr=($H->type=="bytea"?63:0);return$H;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$E){global$b;$l=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' client_encoding=utf8 dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($tf){return
q($tf);}function
query($F,$Fg=false){$H=parent::query($F,$Fg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$H;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Re){global$h;foreach($J
as$N){$Mg=array();$Z=array();foreach($N
as$y=>$X){$Mg[]="$y = $X";if(isset($Re[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Mg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($F,$mg){$this->_conn->query("SET statement_timeout = ".(1000*$mg));$this->_conn->timeout=1000*$mg;return$F;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
quoteBinary($tf){return$this->_conn->quoteBinary($tf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$Fd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$Fd[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Vf;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Vf[lang(25)][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$h)){$Vf[lang(25)][]="jsonb";$U["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$z,$ie=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($ie?" OFFSET $ie":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$L):" $F".(is_view(table_status1($Q))?$Z:$L."WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$L."LIMIT 1)"));}function
db_collation($l,$bb){global$h;return$h->result("SELECT datcollate FROM pg_database WHERE datname = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$I)$H[$I["Name"]]=$I;return($B!=""?$H[$B]:$H);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$H=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment".(min_version(10)?", a.attidentity":"")."
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$I){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$I["full_type"],$A);list(,$T,$Cd,$I["length"],$sa,$ya)=$A;$I["length"].=$ya;$Ta=$T.$sa;if(isset($wa[$Ta])){$I["type"]=$wa[$Ta];$I["full_type"]=$I["type"].$Cd.$ya;}else{$I["type"]=$T;$I["full_type"]=$I["type"].$Cd.$sa.$ya;}if(in_array($I['attidentity'],array('a','d')))$I['default']='GENERATED '.($I['attidentity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$I["null"]=!$I["attnotnull"];$I["auto_increment"]=$I['attidentity']||preg_match('~^nextval\(~i',$I["default"]);$I["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^,)]+(.*)~',$I["default"],$A))$I["default"]=($A[1]=="NULL"?null:idf_unescape($A[1]).$A[2]);$H[$I["field"]]=$I;}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$dg=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $dg AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption, (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $dg AND ci.oid = i.indexrelid",$i)as$I){$hf=$I["relname"];$H[$hf]["type"]=($I["indispartial"]?"INDEX":($I["indisprimary"]?"PRIMARY":($I["indisunique"]?"UNIQUE":"INDEX")));$H[$hf]["columns"]=array();foreach(explode(" ",$I["indkey"])as$gd)$H[$hf]["columns"][]=$f[$gd];$H[$hf]["descs"]=array();foreach(explode(" ",$I["indoption"])as$hd)$H[$hf]["descs"][]=($hd&1?'1':null);$H[$hf]["lengths"]=array();}return$H;}function
foreign_keys($Q){global$le;$H=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$I){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$I['definition'],$A)){$I['source']=array_map('idf_unescape',array_map('trim',explode(',',$A[1])));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$Nd)){$I['ns']=idf_unescape($Nd[2]);$I['table']=idf_unescape($Nd[4]);}$I['target']=array_map('idf_unescape',array_map('trim',explode(',',$A[3])));$I['on_delete']=(preg_match("~ON DELETE ($le)~",$A[4],$Nd)?$Nd[1]:'NO ACTION');$I['on_update']=(preg_match("~ON UPDATE ($le)~",$A[4],$Nd)?$Nd[1]:'NO ACTION');$H[$I['conname']]=$I;}}return$H;}function
constraints($Q){global$le;$H=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($Q)."
ORDER BY connamespace, conname")as$I)$H[$I['conname']]=$I['consrc'];return$H;}function
view($B){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($B)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$h;$H=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$H,$A))$H=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($H);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$h;$h->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($B,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){$c=array();$Ze=array();if($Q!=""&&$Q!=$B)$Ze[]="ALTER TABLE ".table($Q)." RENAME TO ".table($B);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Sg=$X[5];unset($X[5]);if($o[0]==""){if(isset($X[6]))$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";$c[]=($Q!=""?"ADD ":"  ").implode($X);if(isset($X[6]))$c[]=($Q!=""?"ADD":" ")." PRIMARY KEY ($X[0])";}else{if($e!=$X[0])$Ze[]="ALTER TABLE ".table($B)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Sg!="")$Ze[]="COMMENT ON COLUMN ".table($B).".$X[0] IS ".($Sg!=""?substr($Sg,9):"''");}}$c=array_merge($c,$_c);if($Q=="")array_unshift($Ze,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Ze,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($gb!==null)$Ze[]="COMMENT ON TABLE ".table($B)." IS ".q($gb);if($Ea!=""){}foreach($Ze
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($Q,$c){$ub=array();$Nb=array();$Ze=array();foreach($c
as$X){if($X[0]!="INDEX")$ub[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$Ze[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($ub)array_unshift($Ze,"ALTER TABLE ".table($Q).implode(",",$ub));if($Nb)array_unshift($Ze,"DROP INDEX ".implode(", ",$Nb));foreach($Ze
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Xg){return
drop_tables($Xg);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Xg,$fg){foreach(array_merge($S,$Xg)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($fg)))return
false;}return
true;}function
trigger($B,$Q){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$f=array();$Z="WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q)." AND trigger_name = ".q($B);foreach(get_rows("SELECT * FROM information_schema.triggered_update_columns $Z")as$I)$f[]=$I["event_object_column"];$H=array();foreach(get_rows('SELECT trigger_name AS "Trigger", action_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers '."$Z ORDER BY event_manipulation DESC")as$I){if($f&&$I["Event"]=="UPDATE")$I["Event"].=" OF";$I["Of"]=implode(", ",$f);if($H)$I["Event"].=" OR $H[Event]";$H=$I;}return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q))as$I){$Ag=trigger($I["trigger_name"],$Q);$H[$Ag["Trigger"]]=array($Ag["Timing"],$Ag["Event"]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE","INSERT OR UPDATE","INSERT OR UPDATE OF","DELETE OR INSERT","DELETE OR UPDATE","DELETE OR UPDATE OF","DELETE OR INSERT OR UPDATE","DELETE OR INSERT OR UPDATE OF"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$T){$J=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$H=$J[0];$H["returns"]=array("type"=>$H["type_udt_name"]);$H["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$H;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$I){$H=array();foreach($I["fields"]as$o)$H[]=$o["type"];return
idf_escape($B)."(".implode(", ",$H).")";}function
last_id(){return
0;}function
explain($h,$F){return$h->query("EXPLAIN $F");}function
found_rows($R,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$gf))return$gf[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($uf,$i=null){global$h,$U,$Vf;if(!$i)$i=$h;$H=$i->query("SET search_path TO ".idf_escape($uf));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Vf[lang(26)][]=$T;}}return$H;}function
foreign_keys_sql($Q){$H="";$O=table_status($Q);$xc=foreign_keys($Q);ksort($xc);foreach($xc
as$wc=>$vc)$H.="ALTER TABLE ONLY ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." ADD CONSTRAINT ".idf_escape($wc)." $vc[definition] ".($vc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($H?"$H\n":$H);}function
create_sql($Q,$Ea,$Wf){global$h;$H='';$qf=array();$Cf=array();$O=table_status($Q);if(is_view($O)){$Wg=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $Wg[select]",";");}$p=fields($Q);$w=indexes($Q);ksort($w);$pb=constraints($Q);if(!$O||empty($p))return
false;$H="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$pc=>$o){$Fe=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$qf[]=$Fe;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Od)){$Bf=$Od[1];$Of=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($Bf):"SELECT * FROM $Bf"));$Cf[]=($Wf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $Bf;\n":"")."CREATE SEQUENCE $Bf INCREMENT $Of[increment_by] MINVALUE $Of[min_value] MAXVALUE $Of[max_value]".($Ea&&$Of['last_value']?" START $Of[last_value]":"")." CACHE $Of[cache_value];";}}if(!empty($Cf))$H=implode("\n\n",$Cf)."\n\n$H";foreach($w
as$bd=>$v){switch($v['type']){case'UNIQUE':$qf[]="CONSTRAINT ".idf_escape($bd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$qf[]="CONSTRAINT ".idf_escape($bd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($pb
as$lb=>$nb)$qf[]="CONSTRAINT ".idf_escape($lb)." CHECK $nb";$H.=implode(",\n    ",$qf)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$bd=>$v){if($v['type']=='INDEX'){$f=array();foreach($v['columns']as$y=>$X)$f[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$H.="\n\nCREATE INDEX ".idf_escape($bd)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$f).");";}}if($O['Comment'])$H.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$pc=>$o){if($o['comment'])$H.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($pc)." IS ".q($o['comment']).";";}return
rtrim($H,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$H="";foreach(triggers($Q)as$_g=>$zg){$Ag=trigger($_g,$O['Name']);$H.="\nCREATE TRIGGER ".idf_escape($Ag['Trigger'])." $Ag[Timing] $Ag[Event] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $Ag[Type] $Ag[Statement];;\n";}return$H;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}function
driver_config(){$U=array();$Vf=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$Vf[$y]=array_keys($X);}return
array('possible_drivers'=>array("PgSQL","PDO_PgSQL"),'jush'=>"pgsql",'types'=>$U,'structured_types'=>$Vf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","~","~*","!~","!~*","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'operator_regexp'=>'~*','functions'=>array("char_length","distinct","lower","round","to_hex","to_timestamp","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",)),);}}$Mb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;var$_current_db;function
_error($bc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){$this->_link=@oci_new_connect($V,$E,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){$this->_current_db=$j;return
true;}function
query($F,$Fg=false){$G=oci_parse($this->_link,$F);$this->error="";if(!$G){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$H=@oci_execute($G);restore_error_handler();if($H){if(oci_num_fields($G))return
new
Min_Result($G);$this->affected_rows=oci_num_rows($G);oci_free_statement($G);}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=1){$G=$this->query($F);if(!is_object($G)||!oci_fetch($G->_result))return
false;return
oci_result($G->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'OCI-Lob'))$I[$y]=$X->load();}return$I;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;$H->name=oci_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=oci_field_type($this->_result,$e);$H->charsetnr=(preg_match("~raw|blob|bfile~",$H->type)?63:0);return$H;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";var$_current_db;function
connect($M,$V,$E){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$E);return
true;}function
select_db($j){$this->_current_db=$j;return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}function
insertUpdate($Q,$J,$Re){global$h;foreach($J
as$N){$Mg=array();$Z=array();foreach($N
as$y=>$X){$Mg[]="$y = $X";if(isset($Re[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Mg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces ORDER BY 1");}function
limit($F,$Z,$z,$ie=0,$L=" "){return($ie?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($z+$ie).") WHERE rnum > $ie":($z!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($z+$ie):" $F$Z"));}function
limit1($Q,$F,$Z,$L="\n"){return" $F$Z";}function
db_collation($l,$bb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
get_current_db(){global$h;$l=$h->_current_db?$h->_current_db:DB;unset($h->_current_db);return$l;}function
where_owner($Qe,$Ae="owner"){if(!$_GET["ns"])return'';return"$Qe$Ae = sys_context('USERENV', 'CURRENT_SCHEMA')";}function
views_table($f){$Ae=where_owner('');return"(SELECT $f FROM all_views WHERE ".($Ae?$Ae:"rownum < 0").")";}function
tables_list(){$Wg=views_table("view_name");$Ae=where_owner(" AND ");return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."$Ae
UNION SELECT view_name, 'view' FROM $Wg
ORDER BY 1");}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=$h->result("SELECT COUNT(*) FROM all_tables WHERE tablespace_name = ".q($l));return$H;}function
table_status($B=""){$H=array();$wf=q($B);$l=get_current_db();$Wg=views_table("view_name");$Ae=where_owner(" AND ");foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q($l).$Ae.($B!=""?" AND table_name = $wf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM $Wg".($B!=""?" WHERE view_name = $wf":"")."
ORDER BY 1")as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$H=array();$Ae=where_owner(" AND ");foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)."$Ae ORDER BY column_id")as$I){$T=$I["DATA_TYPE"];$Cd="$I[DATA_PRECISION],$I[DATA_SCALE]";if($Cd==",")$Cd=$I["CHAR_COL_DECL_LENGTH"];$H[$I["COLUMN_NAME"]]=array("field"=>$I["COLUMN_NAME"],"full_type"=>$T.($Cd?"($Cd)":""),"type"=>strtolower($T),"length"=>$Cd,"default"=>$I["DATA_DEFAULT"],"null"=>($I["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$H;}function
indexes($Q,$i=null){$H=array();$Ae=where_owner(" AND ","aic.table_owner");foreach(get_rows("SELECT aic.*, ac.constraint_type, atc.data_default
FROM all_ind_columns aic
LEFT JOIN all_constraints ac ON aic.index_name = ac.constraint_name AND aic.table_name = ac.table_name AND aic.index_owner = ac.owner
LEFT JOIN all_tab_cols atc ON aic.column_name = atc.column_name AND aic.table_name = atc.table_name AND aic.index_owner = atc.owner
WHERE aic.table_name = ".q($Q)."$Ae
ORDER BY ac.constraint_type, aic.column_position",$i)as$I){$bd=$I["INDEX_NAME"];$eb=$I["DATA_DEFAULT"];$eb=($eb?trim($eb,'"'):$I["COLUMN_NAME"]);$H[$bd]["type"]=($I["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($I["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$H[$bd]["columns"][]=$eb;$H[$bd]["lengths"][]=($I["CHAR_LENGTH"]&&$I["CHAR_LENGTH"]!=$I["COLUMN_LENGTH"]?$I["CHAR_LENGTH"]:null);$H[$bd]["descs"][]=($I["DESCEND"]&&$I["DESCEND"]=="DESC"?'1':null);}return$H;}function
view($B){$Wg=views_table("view_name, text");$J=get_rows('SELECT text "select" FROM '.$Wg.' WHERE view_name = '.q($B));return
reset($J);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$F){$h->query("EXPLAIN PLAN FOR $F");return$h->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){$c=$Nb=array();$xe=($Q?fields($Q):array());foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");$we=$xe[$o[0]];if($X&&$we){$ke=process_field($we,$we);if($X[2]==$ke[2])$X[2]="";}if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$Nb[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$Nb||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$Nb).")"))&&($Q==$B||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)));}function
alter_indexes($Q,$c){$Nb=array();$Ze=array();foreach($c
as$X){if($X[0]!="INDEX"){$X[2]=preg_replace('~ DESC$~','',$X[2]);$ub=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");array_unshift($Ze,"ALTER TABLE ".table($Q).$ub);}elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$Ze[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($Nb)array_unshift($Ze,"DROP INDEX ".implode(", ",$Nb));foreach($Ze
as$F){if(!queries($F))return
false;}return
true;}function
foreign_keys($Q){$H=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($F)as$I)$H[$I['NAME']]=array("db"=>$I['DEST_DB'],"table"=>$I['DEST_TABLE'],"source"=>array($I['SRC_COLUMN']),"target"=>array($I['DEST_COLUMN']),"on_delete"=>$I['ON_DELETE'],"on_update"=>null,);return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xg){return
apply_queries("DROP VIEW",$Xg);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){$H=get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX')) ORDER BY 1");return($H?$H:get_vals("SELECT DISTINCT owner FROM all_tables WHERE tablespace_name = ".q(DB)." ORDER BY 1"));}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($vf,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($vf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$J=get_rows('SELECT * FROM v$instance');return
reset($J);}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view)$~',$oc);}function
driver_config(){$U=array();$Vf=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$Vf[$y]=array_keys($X);}return
array('possible_drivers'=>array("OCI8","PDO_OCI"),'jush'=>"oracle",'types'=>$U,'structured_types'=>$Vf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("distinct","length","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",)),);}}$Mb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$E){global$b;$l=$b->database();$mb=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($l!="")$mb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$mb);if($this->_link){$id=sqlsrv_server_info($this->_link);$this->server_info=$id['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Fg=false){$G=sqlsrv_query($this->_link,$F);$this->error="";if(!$G){$this->_get_error();return
false;}return$this->store_result($G);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($G=null){if(!$G)$G=$this->_result;if(!$G)return
false;if(sqlsrv_field_metadata($G))return
new
Min_Result($G);$this->affected_rows=sqlsrv_rows_affected($G);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'DateTime'))$I[$y]=$X->format("Y-m-d H:i:s");}return$I;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$H=new
stdClass;$H->name=$o["Name"];$H->orgname=$o["Name"];$H->type=($o["Type"]==1?254:0);return$H;}function
seek($ie){for($s=0;$s<$ie;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$E){$this->_link=@mssql_connect($M,$V,$E);if($this->_link){$G=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($G){$I=$G->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$I[0]] $I[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($F,$Fg=false){$G=@mssql_query($F,$this->_link);$this->error="";if(!$G){$this->error=mssql_get_last_message();return
false;}if($G===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;return
mssql_result($G->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=mssql_num_rows($G);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$H=mssql_fetch_field($this->_result);$H->orgtable=$H->table;$H->orgname=$H->name;return$H;}function
seek($ie){mssql_data_seek($this->_result,$ie);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Re){foreach($J
as$N){$Mg=array();$Z=array();foreach($N
as$y=>$X){$Mg[]="$y = $X";if(isset($Re[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Mg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$z,$ie=0,$L=" "){return($z!==null?" TOP (".($z+$ie).")":"")." $F$Z";}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$bb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$h;$H=array();foreach($k
as$l){$h->select_db($l);$H[$l]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$H;}function
table_status($B=""){$H=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$hb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$H=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$I){$T=$I["type"];$Cd=(preg_match("~char|binary~",$T)?$I["max_length"]:($T=="decimal"?"$I[precision],$I[scale]":""));$H[$I["name"]]=array("field"=>$I["name"],"full_type"=>$T.($Cd?"($Cd)":""),"type"=>$T,"length"=>$Cd,"default"=>$I["default"],"null"=>$I["is_nullable"],"auto_increment"=>$I["is_identity"],"collation"=>$I["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$I["is_identity"],"comment"=>$hb[$I["name"]],);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$i)as$I){$B=$I["name"];$H[$B]["type"]=($I["is_primary_key"]?"PRIMARY":($I["is_unique"]?"UNIQUE":"INDEX"));$H[$B]["lengths"]=array();$H[$B]["columns"][$I["key_ordinal"]]=$I["column_name"];$H[$B]["descs"][$I["key_ordinal"]]=($I["is_descending_key"]?'1':null);}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$H=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$H[preg_replace('~_.*~','',$d)][]=$d;return$H;}function
information_schema($l){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($B,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){$c=array();$hb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$hb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($_c[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$B)queries("EXEC sp_rename ".q(table($Q)).", ".q($B));if($_c)$c[""]=$_c;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}foreach($hb
as$y=>$X){$gb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$gb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($Q,$c){$v=array();$Nb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Nb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Nb||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$Nb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$F){$h->query("SET SHOWPLAN_ALL ON");$H=$h->query($F);$h->query("SET SHOWPLAN_ALL OFF");return$H;}function
found_rows($R,$Z){}function
foreign_keys($Q){$H=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$I){$Cc=&$H[$I["FK_NAME"]];$Cc["db"]=$I["PKTABLE_QUALIFIER"];$Cc["table"]=$I["PKTABLE_NAME"];$Cc["source"][]=$I["FKCOLUMN_NAME"];$Cc["target"][]=$I["PKCOLUMN_NAME"];}return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Xg)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Xg,$fg){return
apply_queries("ALTER SCHEMA ".idf_escape($fg)." TRANSFER",array_merge($S,$Xg));}function
trigger($B){if($B=="")return
array();$J=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$H=reset($J);if($H)$H["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$H["text"]);return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$I)$H[$I["name"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($uf){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$oc);}function
driver_config(){$U=array();$Vf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$Vf[$y]=array_keys($X);}return
array('possible_drivers'=>array("SQLSRV","MSSQL","PDO_DBLIB"),'jush'=>"mssql",'types'=>$U,'structured_types'=>$Vf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("distinct","len","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",)),);}}$Mb["mongo"]="MongoDB (alpha)";if(isset($_GET["mongo"])){define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Ng,$C){try{$this->_link=new
MongoClient($Ng,$C);if($C["password"]!=""){$C["password"]="";try{new
MongoClient($Ng,$C);$this->error=lang(22);}catch(Exception$Qb){}}}catch(Exception$Qb){$this->error=$Qb->getMessage();}}function
query($F){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$ec){$this->error=$ec->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$rd){$I=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoId')?"ObjectId(\"$X\")":(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?"$X":(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$ud=array_keys($this->_rows[0]);$B=$ud[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Re="_id";function
select($Q,$K,$Z,$Jc,$ue=array(),$z=1,$D=0,$Te=false){$K=($K==array("*")?array():array_fill_keys($K,true));$Lf=array();foreach($ue
as$X){$X=preg_replace('~ DESC$~','',$X,1,$sb);$Lf[$X]=($sb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$K)->sort($Lf)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($Q,$N){try{$H=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$H['code'];$this->_conn->error=$H['err'];$this->_conn->last_id=$N['_id'];return!$H['err'];}catch(Exception$ec){$this->_conn->error=$ec->getMessage();return
false;}}}function
get_databases($yc){global$h;$H=array();$Bb=$h->_link->listDBs();foreach($Bb['databases']as$l)$H[]=$l['name'];return$H;}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=count($h->_link->selectDB($l)->getCollectionNames(true));return$H;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$h;foreach($k
as$l){$mf=$h->_link->selectDB($l)->drop();if(!$mf['ok'])return
false;}return
true;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->_db->selectCollection($Q)->getIndexInfo()as$v){$Hb=array();foreach($v["key"]as$e=>$T)$Hb[]=($T==-1?'1':null);$H[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Hb,);}return$H;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$re=array("=");$qe=null;}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$affected_rows,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Ng,$C){$Xa='MongoDB\Driver\Manager';$this->_link=new$Xa($Ng,$C);$this->executeCommand('admin',array('ping'=>1));}function
executeCommand($l,$fb){$Xa='MongoDB\Driver\Command';try{return$this->_link->executeCommand($l,new$Xa($fb));}catch(Exception$Qb){$this->error=$Qb->getMessage();return
array();}}function
executeBulkWrite($ce,$Qa,$tb){try{$pf=$this->_link->executeBulkWrite($ce,$Qa);$this->affected_rows=$pf->$tb();return
true;}catch(Exception$Qb){$this->error=$Qb->getMessage();return
false;}}function
query($F){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$rd){$I=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'."$X\")":(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->getData():(is_a($X,'MongoDB\BSON\Regex')?"$X":(is_object($X)||is_array($X)?json_encode($X,256):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$ud=array_keys($this->_rows[0]);$B=$ud[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Re="_id";function
select($Q,$K,$Z,$Jc,$ue=array(),$z=1,$D=0,$Te=false){global$h;$K=($K==array("*")?array():array_fill_keys($K,1));if(count($K)&&!isset($K['_id']))$K['_id']=0;$Z=where_to_query($Z);$Lf=array();foreach($ue
as$X){$X=preg_replace('~ DESC$~','',$X,1,$sb);$Lf[$X]=($sb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$If=$D*$z;$Xa='MongoDB\Driver\Query';try{return
new
Min_Result($h->_link->executeQuery("$h->_db_name.$Q",new$Xa($Z,array('projection'=>$K,'limit'=>$z,'skip'=>$If,'sort'=>$Lf))));}catch(Exception$Qb){$h->error=$Qb->getMessage();return
false;}}function
update($Q,$N,$af,$z=0,$L="\n"){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($af);$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());if(isset($N['_id']))unset($N['_id']);$if=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$if[$y]=1;unset($N[$y]);}}$Mg=array('$set'=>$N);if(count($if))$Mg['$unset']=$if;$Qa->update($Z,$Mg,array('upsert'=>false));return$h->executeBulkWrite("$l.$Q",$Qa,'getModifiedCount');}function
delete($Q,$af,$z=0){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($af);$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());$Qa->delete($Z,array('limit'=>$z));return$h->executeBulkWrite("$l.$Q",$Qa,'getDeletedCount');}function
insert($Q,$N){global$h;$l=$h->_db_name;$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());if($N['_id']=='')unset($N['_id']);$Qa->insert($N);return$h->executeBulkWrite("$l.$Q",$Qa,'getInsertedCount');}}function
get_databases($yc){global$h;$H=array();foreach($h->executeCommand('admin',array('listDatabases'=>1))as$Bb){foreach($Bb->databases
as$l)$H[]=$l->name;}return$H;}function
count_tables($k){$H=array();return$H;}function
tables_list(){global$h;$cb=array();foreach($h->executeCommand($h->_db_name,array('listCollections'=>1))as$G)$cb[$G->name]='table';return$cb;}function
drop_databases($k){return
false;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->executeCommand($h->_db_name,array('listIndexes'=>$Q))as$v){$Hb=array();$f=array();foreach(get_object_vars($v->key)as$e=>$T){$Hb[]=($T==-1?'1':null);$f[]=$e;}$H[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Hb,);}return$H;}function
fields($Q){global$m;$p=fields_from_edit();if(!$p){$G=$m->select($Q,array("*"),null,null,array(),10);if($G){while($I=$G->fetch_assoc()){foreach($I
as$y=>$X){$I[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}}return$p;}function
found_rows($R,$Z){global$h;$Z=where_to_query($Z);$tg=$h->executeCommand($h->_db_name,array('count'=>$R['Name'],'query'=>$Z))->toArray();return$tg[0]->n;}function
sql_query_where_parser($af){$af=preg_replace('~^\sWHERE \(?\(?(.+?)\)?\)?$~','\1',$af);$fh=explode(' AND ',$af);$gh=explode(') OR (',$af);$Z=array();foreach($fh
as$dh)$Z[]=trim($dh);if(count($gh)==1)$gh=array();elseif(count($gh)>1)$Z=array();return
where_to_query($Z,$gh);}function
where_to_query($bh=array(),$ch=array()){global$b;$_b=array();foreach(array('and'=>$bh,'or'=>$ch)as$T=>$Z){if(is_array($Z)){foreach($Z
as$hc){list($ab,$oe,$X)=explode(" ",$hc,3);if($ab=="_id"&&preg_match('~^(MongoDB\\\\BSON\\\\ObjectID)\("(.+)"\)$~',$X,$A)){list(,$Xa,$X)=$A;$X=new$Xa($X);}if(!in_array($oe,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$oe,$A)){$X=(float)$X;$oe=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$oe,$A)){$Ab=new
DateTime($X);$Xa='MongoDB\BSON\UTCDatetime';$X=new$Xa($Ab->getTimestamp()*1000);$oe=$A[1];}switch($oe){case'=':$oe='$eq';break;case'!=':$oe='$ne';break;case'>':$oe='$gt';break;case'<':$oe='$lt';break;case'>=':$oe='$gte';break;case'<=':$oe='$lte';break;case'regex':$oe='$regex';break;default:continue
2;}if($T=='and')$_b['$and'][]=array($ab=>array($oe=>$X));elseif($T=='or')$_b['$or'][]=array($ab=>array($oe=>$X));}}}return$_b;}$re=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);$qe='regex';}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$nc=false){$H=array();foreach(tables_list()as$Q=>$T){$H[$Q]=array("Name"=>$Q);if($B==$Q)return$H[$Q];}return$H;}function
create_database($l,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$wb=$b->credentials();return$wb[1];}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();$C=array();if($V.$E!=""){$C["username"]=$V;$C["password"]=$E;}$l=$b->database();if($l!="")$C["db"]=$l;if(($Da=getenv("MONGO_AUTH_SOURCE")))$C["authSource"]=$Da;$h->connect("mongodb://$M",$C);if($h->error)return$h->error;return$h;}function
alter_indexes($Q,$c){global$h;foreach($c
as$X){list($T,$B,$N)=$X;if($N=="DROP")$H=$h->_db->command(array("deleteIndexes"=>$Q,"index"=>$B));else{$f=array();foreach($N
as$e){$e=preg_replace('~ DESC$~','',$e,1,$sb);$f[$e]=($sb?-1:1);}$H=$h->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$B,));}if($H['errmsg']){$h->error=$H['errmsg'];return
false;}}return
true;}function
support($oc){return
preg_match("~database|indexes|descidx~",$oc);}function
db_collation($l,$bb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){global$h;if($Q==""){$h->_db->createCollection($B);return
true;}}function
drop_tables($S){global$h;foreach($S
as$Q){$mf=$h->_db->selectCollection($Q)->drop();if(!$mf['ok'])return
false;}return
true;}function
truncate_tables($S){global$h;foreach($S
as$Q){$mf=$h->_db->selectCollection($Q)->remove();if(!$mf['ok'])return
false;}return
true;}function
driver_config(){global$re,$qe;return
array('possible_drivers'=>array("mongo","mongodb"),'jush'=>"mongo",'operators'=>$re,'operator_regexp'=>$qe,'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),);}}$Mb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($Ie,$qb=array(),$Wd='GET'){@ini_set('track_errors',1);$rc=@file_get_contents("$this->_url/".ltrim($Ie,'/'),false,stream_context_create(array('http'=>array('method'=>$Wd,'content'=>$qb===null?$qb:json_encode($qb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$rc){$this->error=$php_errormsg;return$rc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$H=json_decode($rc,true);if($H===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$ob=get_defined_constants(true);foreach($ob['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$H;}function
query($Ie,$qb=array(),$Wd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Ie,'/'),$qb,$Wd);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('');if($H)$this->server_info=$H['version']['number'];return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($J){$this->num_rows=count($J);$this->_rows=$J;reset($this->_rows);}function
fetch_assoc(){$H=current($this->_rows);next($this->_rows);return$H;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$K,$Z,$Jc,$ue=array(),$z=1,$D=0,$Te=false){global$b;$_b=array();$F="$Q/_search";if($K!=array("*"))$_b["fields"]=$K;if($ue){$Lf=array();foreach($ue
as$ab){$ab=preg_replace('~ DESC$~','',$ab,1,$sb);$Lf[]=($sb?array($ab=>"desc"):$ab);}$_b["sort"]=$Lf;}if($z){$_b["size"]=+$z;if($D)$_b["from"]=($D*$z);}foreach($Z
as$X){list($ab,$oe,$X)=explode(" ",$X,3);if($ab=="_id")$_b["query"]["ids"]["values"][]=$X;elseif($ab.$X!=""){$hg=array("term"=>array(($ab!=""?$ab:"_all")=>$X));if($oe=="=")$_b["query"]["filtered"]["filter"]["and"][]=$hg;else$_b["query"]["filtered"]["query"]["bool"]["must"][]=$hg;}}if($_b["query"]&&!$_b["query"]["filtered"]["query"]&&!$_b["query"]["ids"])$_b["query"]["filtered"]["query"]=array("match_all"=>array());$Sf=microtime(true);$wf=$this->_conn->query($F,$_b);if($Te)echo$b->selectQuery("$F: ".json_encode($_b),$Sf,!$wf);if(!$wf)return
false;$H=array();foreach($wf['hits']['hits']as$Vc){$I=array();if($K==array("*"))$I["_id"]=$Vc["_id"];$p=$Vc['_source'];if($K!=array("*")){$p=array();foreach($K
as$y)$p[$y]=$Vc['fields'][$y];}foreach($p
as$y=>$X){if($_b["fields"])$X=$X[0];$I[$y]=(is_array($X)?json_encode($X):$X);}$H[]=$I;}return
new
Min_Result($H);}function
update($T,$ef,$af,$z=0,$L="\n"){$He=preg_split('~ *= *~',$af);if(count($He)==2){$t=trim($He[1]);$F="$T/$t";return$this->_conn->query($F,$ef,'POST');}return
false;}function
insert($T,$ef){$t="";$F="$T/$t";$mf=$this->_conn->query($F,$ef,'POST');$this->_conn->last_id=$mf['_id'];return$mf['created'];}function
delete($T,$af,$z=0){$Zc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Zc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Sa){$He=preg_split('~ *= *~',$Sa);if(count($He)==2)$Zc[]=trim($He[1]);}}$this->_conn->affected_rows=0;foreach($Zc
as$t){$F="{$T}/{$t}";$mf=$this->_conn->query($F,'{}','DELETE');if(is_array($mf)&&$mf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();if($E!=""&&$h->connect($M,$V,""))return
lang(22);if($h->connect($M,$V,$E))return$h;return$h->error;}function
support($oc){return
preg_match("~database|table|columns~",$oc);}function
logged_user(){global$b;$wb=$b->credentials();return$wb[1];}function
get_databases(){global$h;$H=$h->rootQuery('_aliases');if($H){$H=array_keys($H);sort($H,SORT_STRING);}return$H;}function
collations(){return
array();}function
db_collation($l,$bb){}function
engines(){return
array();}function
count_tables($k){global$h;$H=array();$G=$h->query('_stats');if($G&&$G['indices']){$fd=$G['indices'];foreach($fd
as$ed=>$Tf){$dd=$Tf['total']['indexing'];$H[$ed]=$dd['index_total'];}}return$H;}function
tables_list(){global$h;if(min_version(6))return
array('_doc'=>'table');$H=$h->query('_mapping');if($H)$H=array_fill_keys(array_keys($H[$h->_db]["mappings"]),'table');return$H;}function
table_status($B="",$nc=false){global$h;$wf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$H=array();if($wf){$S=$wf["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$H[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($B!=""&&$B==$Q["key"])return$H[$B];}}return$H;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$h;$Kd=array();if(min_version(6)){$G=$h->query("_mapping");if($G)$Kd=$G[$h->_db]['mappings']['properties'];}else{$G=$h->query("$Q/_mapping");if($G){$Kd=$G[$Q]['properties'];if(!$Kd)$Kd=$G[$h->_db]['mappings'][$Q]['properties'];}}$H=array();if($Kd){foreach($Kd
as$B=>$o){$H[$B]=array("field"=>$B,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($H[$B]["privileges"]["insert"]);unset($H[$B]["privileges"]["update"]);}}}return$H;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$h;return$h->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$h;return$h->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){global$h;$We=array();foreach($p
as$lc){$pc=trim($lc[1][0]);$qc=trim($lc[1][1]?$lc[1][1]:"text");$We[$pc]=array('type'=>$qc);}if(!empty($We))$We=array('properties'=>$We);return$h->query("_mapping/{$B}",$We,'PUT');}function
drop_tables($S){global$h;$H=true;foreach($S
as$Q)$H=$H&&$h->query(urlencode($Q),array(),'DELETE');return$H;}function
last_id(){global$h;return$h->last_id;}function
driver_config(){$U=array();$Vf=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$y=>$X){$U+=$X;$Vf[$y]=array_keys($X);}return
array('possible_drivers'=>array("json + allow_url_fopen"),'jush'=>"elastic",'operators'=>array("=","query"),'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),'types'=>$U,'structured_types'=>$Vf,);}}class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".lang(33)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($ub=false){return
password_file($ub);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){}function
database(){global$h;if($h){$k=$this->databases(false);return(!$k?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($yc=true){return
get_databases($yc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$H=array();$q="adminer.css";if(file_exists($q))$H[]=$q;return$H;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.lang(34).'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.lang(35).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".lang(36)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(37))."\n";}function
loginFormField($B,$Tc,$Y){return$Tc.$Y;}function
login($Id,$E){return
true;}function
tableName($bg){return
h($bg["Comment"]!=""?$bg["Comment"]:$bg["Name"]);}function
fieldName($o,$ue=0){return
h(preg_replace('~\s+\[.*\]$~','',($o["comment"]!=""?$o["comment"]:$o["field"])));}function
selectLinks($bg,$N=""){$a=$bg["Name"];if($N!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$N).'">'.lang(38)."</a>\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$ag){$H=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($Q)."
ORDER BY ORDINAL_POSITION",null,"")as$I)$H[$I["TABLE_NAME"]]["keys"][$I["CONSTRAINT_NAME"]][$I["COLUMN_NAME"]]=$I["REFERENCED_COLUMN_NAME"];foreach($H
as$y=>$X){$B=$this->tableName(table_status($y,true));if($B!=""){$wf=preg_quote($ag);$L="(:|\\s*-)?\\s+";$H[$y]["name"]=(preg_match("(^$wf$L(.+)|^(.+?)$L$wf\$)iu",$B,$A)?$A[2].$A[3]:$B);}else
unset($H[$y]);}return$H;}function
backwardKeysPrint($Ia,$I){foreach($Ia
as$Q=>$Ha){foreach($Ha["keys"]as$db){$_=ME.'select='.urlencode($Q);$s=0;foreach($db
as$e=>$X)$_.=where_link($s++,$e,$I[$X]);echo"<a href='".h($_)."'>".h($Ha["name"])."</a>";$_=ME.'edit='.urlencode($Q);foreach($db
as$e=>$X)$_.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($I[$X]);echo"<a href='".h($_)."' title='".lang(38)."'>+</a> ";}}}function
selectQuery($F,$Sf,$mc=false){return"<!--\n".str_replace("--","--><!-- ",$F)."\n(".format_time($Sf).")\n-->\n";}function
rowDescription($Q){foreach(fields($Q)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($J,$Bc){$H=$J;foreach($J[0]as$y=>$X){if(list($Q,$t,$B)=$this->_foreignColumn($Bc,$y)){$Zc=array();foreach($J
as$I)$Zc[$I[$y]]=q($I[$y]);$Gb=$this->_values[$Q];if(!$Gb)$Gb=get_key_vals("SELECT $t, $B FROM ".table($Q)." WHERE $t IN (".implode(", ",$Zc).")");foreach($J
as$ae=>$I){if(isset($I[$y]))$H[$ae][$y]=(string)$Gb[$I[$y]];}}}return$H;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$ye){$H=$X;$_=h($_);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$H=lang(39,strlen($ye));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$ye))$H="<img src='$_' alt='$H'>";}if(like_bool($o)&&$H!="")$H=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?lang(40):lang(41));if($_)$H="<a href='$_'".(is_url($_)?target_blank():"").">$H</a>";if(!$_&&!like_bool($o)&&preg_match(number_type(),$o["type"]))$H="<div class='number'>$H</div>";elseif(preg_match('~date~',$o["type"]))$H="<div class='datetime'>$H</div>";return$H;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~',lang(42),$X);return$X;}function
selectColumnsPrint($K,$f){}function
selectSearchPrint($Z,$f,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(43)."</legend><div>\n";$ud=array();foreach($Z
as$y=>$X)$ud[$X["col"]]=$y;$s=0;$p=fields($_GET["select"]);foreach($f
as$B=>$Fb){$o=$p[$B];if(preg_match("~enum~",$o["type"])||like_bool($o)){$y=$ud[$B];$s--;echo"<div>".h($Fb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'>:",(like_bool($o)?" <select name='where[$s][val]'>".optionlist(array(""=>"",lang(41),lang(40)),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$o,(array)$Z[$y]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$B]);}elseif(is_array($C=$this->_foreignKeyOptions($_GET["select"],$B))){if($p[$B]["null"])$C[0]='('.lang(7).')';$y=$ud[$B];$s--;echo"<div>".h($Fb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($C,$Z[$y]["val"],true)."</select></div>\n";unset($f[$B]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".lang(44).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".lang(44).")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($ue,$f,$w){$ve=array();foreach($w
as$y=>$v){$ue=array();foreach($v["columns"]as$X)$ue[]=$f[$X];if(count(array_filter($ue,'strlen'))>1&&$y!="PRIMARY")$ve[$y]=implode(", ",$ue);}if($ve){echo'<fieldset><legend>'.lang(45)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$ve,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(46)."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($jg){}function
selectActionPrint($w){echo"<fieldset><legend>".lang(47)."</legend><div>","<input type='submit' value='".lang(48)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Vb,$f){if($Vb){print_fieldset("email",lang(49),$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".lang(50).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(51).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(52).": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Vb)==1?'<input type="hidden" name="email_field" value="'.h(key($Vb)).'">':html_select("email_field",$Vb)),"<input type='submit' name='email' value='".lang(53)."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$w){return
array(array(),array());}function
selectSearchProcess($p,$w){global$m;$H=array();foreach((array)$_GET["where"]as$y=>$Z){$ab=$Z["col"];$oe=$Z["op"];$X=$Z["val"];if(($y<0?"":$ab).$X!=""){$ib=array();foreach(($ab!=""?array($ab=>$p[$ab]):$p)as$B=>$o){if($ab!=""||is_numeric($X)||!preg_match(number_type(),$o["type"])){$B=idf_escape($B);if($ab!=""&&$o["type"]=="enum")$ib[]=(in_array(0,$X)?"$B IS NULL OR ":"")."$B IN (".implode(", ",array_map('intval',$X)).")";else{$kg=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$oe&&$kg&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$ib[]=$m->convertSearch($B,$X,$o).($Y=="NULL"?" IS".($oe==">="?" NOT":"")." $Y":(in_array($oe,$this->operators)||$oe=="="?" $oe $Y":($kg?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$ib[]="$B IS NULL";}}}$H[]=($ib?"(".implode(" OR ",$ib).")":"1 = 0");}}return$H;}function
selectOrderProcess($p,$w){$cd=$_GET["index_order"];if($cd!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($cd!=""?array($w[$cd]):$w)as$v){if($cd!=""||$v["type"]=="INDEX"){$Oc=array_filter($v["descs"]);$Fb=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$Fb=true;break;}}$H=array();foreach($v["columns"]as$y=>$X)$H[]=idf_escape($X).(($Oc?$v["descs"][$y]:$Fb)?" DESC":"");return$H;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Bc){if($_POST["email_append"])return
true;if($_POST["email"]){$_f=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$Xf=$_POST["email_subject"];$Ud=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Xf.$Ud",$Od);$J=get_rows("SELECT DISTINCT $o".($Od[1]?", ".implode(", ",array_map('idf_escape',array_unique($Od[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($J,$Bc)as$I){$kf=array('{\\'=>'{');foreach($Od[1]as$X)$kf['{$'."$X}"]=$this->editVal($I[$X],$p[$X]);$Ub=$I[$_POST["email_field"]];if(is_mail($Ub)&&send_mail($Ub,strtr($Xf,$kf),strtr($Ud,$kf),$_POST["email_from"],$_FILES["email_files"]))$_f++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(54,$_f));}return
false;}function
selectQueryBuild($K,$Z,$Jc,$ue,$z,$D){return"";}function
messageQuery($F,$lg,$mc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$F)."\n".($lg?"($lg)\n":"")."-->";}function
editRowPrint($Q,$p,$I,$Mg){}function
editFunctions($o){$H=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$H["NULL"]=lang(7);$H[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$H["now"]=lang(55);if(preg_match('~_(md5|sha1)$~i',$o["field"],$A))$H[]=strtolower($A[1]);return$H;}function
editInput($Q,$o,$Ba,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ba value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Ba,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$C=$this->_foreignKeyOptions($Q,$o["field"],$Y);if($C!==null)return(is_array($C)?"<select$Ba>".optionlist($C,$Y,true)."</select>":"<input value='".h($Y)."'$Ba class='hidden'>"."<input value='".h($C)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($Q)."&field=".urlencode($o["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($o))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Ba>";$Uc="";if(preg_match('~time~',$o["type"]))$Uc=lang(56);if(preg_match('~date|timestamp~',$o["type"]))$Uc=lang(57).($Uc?" [$Uc]":"");if($Uc)return"<input value='".h($Y)."'$Ba> ($Uc)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Ba>";return'';}function
editHint($Q,$o,$Y){return(preg_match('~\s+(\[.*\])$~',($o["comment"]!=""?$o["comment"]:$o["field"]),$A)?h(" $A[1]"):'');}function
processInput($o,$Y,$r=""){if($r=="now")return"$r()";$H=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote(lang(42)))).'(.*))',$Y,$A))$H=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$H=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$H:q($H));if($Y==""&&like_bool($o))$H="'0'";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$H="NULL";elseif(preg_match('~^(md5|sha1)$~',$r))$H="$r($H)";return
unconvert_field($o,$H);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Wf,$qd=0){echo"\xef\xbb\xbf";}function
dumpData($Q,$Wf,$F){global$h;$G=$h->query($F,1);if($G){while($I=$G->fetch_assoc()){if($Wf=="table"){dump_csv(array_keys($I));$Wf="INSERT";}dump_csv($I);}}}function
dumpFilename($Yc){return
friendly_url($Yc);}function
dumpHeaders($Yc,$Yd=false){$ic="csv";header("Content-Type: text/csv; charset=utf-8");return$ic;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Xd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Xd=="auth"){$uc=true;foreach((array)$_SESSION["pwds"]as$Ug=>$Ef){foreach($Ef[""]as$V=>$E){if($E!==null){if($uc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$uc=false;}echo"<li><a href='".h(auth_url($Ug,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a>\n";}}}}else{$this->databasesPrint($Xd);if($Xd!="db"&&$Xd!="ns"){$R=table_status('',true);if(!$R)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($R);}}}function
databasesPrint($Xd){}function
tablesPrint($S){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$I){echo'<li>';$B=$this->tableName($I);if(isset($I["Engine"])&&$B!="")echo"<a href='".h(ME).'select='.urlencode($I["Name"])."'".bold($_GET["select"]==$I["Name"]||$_GET["edit"]==$I["Name"],"select")." title='".lang(58)."'>$B</a>\n";}echo"</ul>\n";}function
_foreignColumn($Bc,$e){foreach((array)$Bc[$e]as$Ac){if(count($Ac["source"])==1){$B=$this->rowDescription($Ac["table"]);if($B!=""){$t=idf_escape($Ac["target"][0]);return
array($Ac["table"],$t,$B);}}}}function
_foreignKeyOptions($Q,$e,$Y=null){global$h;if(list($fg,$t,$B)=$this->_foreignColumn(column_foreign_keys($Q),$e)){$H=&$this->_values[$fg];if($H===null){$R=table_status($fg);$H=($R["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $B FROM ".table($fg)." ORDER BY 2"));}if(!$H&&$Y!==null)return$h->result("SELECT $B FROM ".table($fg)." WHERE $t = ".q($Y));return$H;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$Mb=array("server"=>"MySQL")+$Mb;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$E="",$j=null,$Ne=null,$Kf=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Wc,$Ne)=explode(":",$M,2);$Rf=$b->connectSsl();if($Rf)$this->ssl_set($Rf['key'],$Rf['cert'],$Rf['ca'],'','');$H=@$this->real_connect(($M!=""?$Wc:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$j,(is_numeric($Ne)?$Ne:ini_get("mysqli.default_port")),(!is_numeric($Ne)?$Ne:$Kf),($Rf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$H;}function
set_charset($Ra){if(parent::set_charset($Ra))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ra");}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch_array();return$I[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(59,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ra){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ra,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ra");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($F,$Fg=false){$G=@($Fg?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$G){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($G===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
mysql_result($G->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;$this->num_rows=mysql_num_rows($G);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$H=mysql_fetch_field($this->_result,$this->_offset++);$H->orgtable=$H->table;$H->orgname=$H->name;$H->charsetnr=($H->blob?63:0);return$H;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$E){global$b;$C=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Rf=$b->connectSsl();if($Rf){if(!empty($Rf['key']))$C[PDO::MYSQL_ATTR_SSL_KEY]=$Rf['key'];if(!empty($Rf['cert']))$C[PDO::MYSQL_ATTR_SSL_CERT]=$Rf['cert'];if(!empty($Rf['ca']))$C[PDO::MYSQL_ATTR_SSL_CA]=$Rf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E,$C);return
true;}function
set_charset($Ra){$this->query("SET NAMES $Ra");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Fg=false){$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,!$Fg);return
parent::query($F,$Fg);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$J,$Re){$f=array_keys(reset($J));$Qe="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Tg=array();foreach($f
as$y)$Tg[$y]="$y = VALUES($y)";$Yf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Tg);$Tg=array();$Cd=0;foreach($J
as$N){$Y="(".implode(", ",$N).")";if($Tg&&(strlen($Qe)+$Cd+strlen($Y)+strlen($Yf)>1e6)){if(!queries($Qe.implode(",\n",$Tg).$Yf))return
false;$Tg=array();$Cd=0;}$Tg[]=$Y;$Cd+=strlen($Y)+2;}return
queries($Qe.implode(",\n",$Tg).$Yf);}function
slowQuery($F,$mg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$mg FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($mg*1000).") */ $A[2]";}}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$G=$this->_conn->query("SHOW WARNINGS");if($G&&$G->num_rows){ob_start();select($G);return
ob_get_clean();}}function
tableHelp($B){$Ld=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Ld?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Ld?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Vf;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Vf[lang(25)][]="json";$U["json"]=4294967295;}return$h;}$H=$h->error;if(function_exists('iconv')&&!is_utf8($H)&&strlen($tf=iconv("windows-1250","utf-8",$H))>strlen($H))$H=$tf;return$H;}function
get_databases($yc){$H=get_session("dbs");if($H===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$H=($yc?slow_query($F):get_vals($F));restart_session();set_session("dbs",$H);stop_session();}return$H;}function
limit($F,$Z,$z,$ie=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($ie?" OFFSET $ie":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$bb){global$h;$H=null;$ub=$h->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$ub,$A))$H=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$ub,$A))$H=$bb[$A[1]][-1];return$H;}function
engines(){$H=array();foreach(get_rows("SHOW ENGINES")as$I){if(preg_match("~YES|DEFAULT~",$I["Support"]))$H[]=$I["Engine"];}return$H;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$H=array();foreach($k
as$l)$H[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$H;}function
table_status($B="",$nc=false){$H=array();foreach(get_rows($nc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$I){if($I["Engine"]=="InnoDB")$I["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$I["Comment"]);if(!isset($I["Engine"]))$I["Comment"]="";if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$H=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$I){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$I["Type"],$A);$H[$I["Field"]]=array("field"=>$I["Field"],"full_type"=>$I["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($I["Default"]!=""||preg_match("~char|set~",$A[1])?(preg_match('~text~',$A[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$I["Default"])):$I["Default"]):null),"null"=>($I["Null"]=="YES"),"auto_increment"=>($I["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$I["Extra"],$A)?$A[1]:""),"collation"=>$I["Collation"],"privileges"=>array_flip(preg_split('~, *~',$I["Privileges"])),"comment"=>$I["Comment"],"primary"=>($I["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$I["Extra"]),);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$i)as$I){$B=$I["Key_name"];$H[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($I["Index_type"]=="FULLTEXT"?"FULLTEXT":($I["Non_unique"]?($I["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$H[$B]["columns"][]=$I["Column_name"];$H[$B]["lengths"][]=($I["Index_type"]=="SPATIAL"?null:$I["Sub_part"]);$H[$B]["descs"][]=null;}return$H;}function
foreign_keys($Q){global$h,$le;static$Je='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$H=array();$vb=$h->result("SHOW CREATE TABLE ".table($Q),1);if($vb){preg_match_all("~CONSTRAINT ($Je) FOREIGN KEY ?\\(((?:$Je,? ?)+)\\) REFERENCES ($Je)(?:\\.($Je))? \\(((?:$Je,? ?)+)\\)(?: ON DELETE ($le))?(?: ON UPDATE ($le))?~",$vb,$Od,PREG_SET_ORDER);foreach($Od
as$A){preg_match_all("~$Je~",$A[2],$Mf);preg_match_all("~$Je~",$A[5],$fg);$H[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Mf[0]),"target"=>array_map('idf_unescape',$fg[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$H=array();foreach(get_rows("SHOW COLLATION")as$I){if($I["Default"])$H[$I["Charset"]][-1]=$I["Collation"];else$H[$I["Charset"]][]=$I["Collation"];}ksort($H);foreach($H
as$y=>$X)asort($H[$y]);return$H;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$H=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$H;}function
rename_database($B,$d){$H=false;if(create_database($B,$d)){$S=array();$Xg=array();foreach(tables_list()as$Q=>$T){if($T=='VIEW')$Xg[]=$Q;else$S[]=$Q;}$H=(!$S&&!$Xg)||move_tables($S,$Xg,$B);drop_databases($H?array(DB):array());}return$H;}function
auto_increment(){$Fa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Fa="";break;}if($v["type"]=="PRIMARY")$Fa=" UNIQUE";}}return" AUTO_INCREMENT$Fa";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ge){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$_c);$O=($gb!==null?" COMMENT=".q($gb):"").($Yb?" ENGINE=".q($Yb):"").($d?" COLLATE ".q($d):"").($Ea!=""?" AUTO_INCREMENT=$Ea":"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Ge");if($Q!=$B)$c[]="RENAME TO ".table($B);if($O)$c[]=ltrim($O);return($c||$Ge?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Ge):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Xg)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Xg,$fg){global$h;$jf=array();foreach($S
as$Q)$jf[]=table($Q)." TO ".idf_escape($fg).".".table($Q);if(!$jf||queries("RENAME TABLE ".implode(", ",$jf))){$Eb=array();foreach($Xg
as$Q)$Eb[table($Q)]=view($Q);$h->select_db($fg);$l=idf_escape(DB);foreach($Eb
as$B=>$Wg){if(!queries("CREATE VIEW $B AS ".str_replace(" $l."," ",$Wg["select"]))||!queries("DROP VIEW $l.$B"))return
false;}return
true;}return
false;}function
copy_tables($S,$Xg,$fg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$B=($fg==DB?table("copy_$Q"):idf_escape($fg).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $B"))||!queries("CREATE TABLE $B LIKE ".table($Q))||!queries("INSERT INTO $B SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I){$Ag=$I["Trigger"];if(!queries("CREATE TRIGGER ".($fg==DB?idf_escape("copy_$Ag"):idf_escape($fg).".".idf_escape($Ag))." $I[Timing] $I[Event] ON $B FOR EACH ROW\n$I[Statement];"))return
false;}}foreach($Xg
as$Q){$B=($fg==DB?table("copy_$Q"):idf_escape($fg).".".table($Q));$Wg=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $B"))||!queries("CREATE VIEW $B AS $Wg[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$J=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I)$H[$I["Trigger"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$T){global$h,$Zb,$kd,$U;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Nf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Eg="((".implode("|",array_merge(array_keys($U),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Zb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Je="$Nf*(".($T=="FUNCTION"?"":$kd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Eg";$ub=$h->result("SHOW CREATE $T ".idf_escape($B),2);preg_match("~\\(((?:$Je\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Eg\\s+":"")."(.*)~is",$ub,$A);$p=array();preg_match_all("~$Je\\s*,?~is",$A[1],$Od,PREG_SET_ORDER);foreach($Od
as$De)$p[]=array("field"=>str_replace("``","`",$De[2]).$De[3],"type"=>strtolower($De[5]),"length"=>preg_replace_callback("~$Zb~s",'normalize_enum',$De[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$De[8] $De[7]"))),"null"=>1,"full_type"=>$De[4],"inout"=>strtoupper($De[1]),"collation"=>strtolower($De[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$A[11]);return
array("fields"=>$p,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$I){return
idf_escape($B);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$F){return$h->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$F);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($uf,$i=null){return
true;}function
create_sql($Q,$Ea,$Wf){global$h;$H=$h->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ea)$H=preg_replace('~ AUTO_INCREMENT=\d+~','',$H);return$H;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$H="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$I)$H.="\nCREATE TRIGGER ".idf_escape($I["Trigger"])." $I[Timing] $I[Event] ON ".table($I["Table"])." FOR EACH ROW\n$I[Statement];;\n";return$H;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$H){if(preg_match("~binary~",$o["type"]))$H="UNHEX($H)";if($o["type"]=="bit")$H="CONV($H, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"])){$Qe=(min_version(8)?"ST_":"");$H=$Qe."GeomFromText($H, $Qe"."SRID($o[field]))";}return$H;}function
support($oc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}function
driver_config(){$U=array();$Vf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(60)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$Vf[$y]=array_keys($X);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$U,'structured_types'=>$Vf,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","distinct","from_unixtime","unix_timestamp","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'operator_regexp'=>'REGEXP','grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$jb=driver_config();$Pe=$jb['possible_drivers'];$x=$jb['jush'];$U=$jb['types'];$Vf=$jb['structured_types'];$Lg=$jb['unsigned'];$re=$jb['operators'];$qe=isset($jb['operator_regexp'])&&in_array($jb['operator_regexp'],$re)?$jb['operator_regexp']:null;$Ic=$jb['functions'];$Mc=$jb['grouping'];$Rb=$jb['edit_functions'];if($b->operators===null){$b->operators=$re;$b->operator_regexp=$qe;}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.8.2";function
page_header($og,$n="",$Pa=array(),$pg=""){global$ba,$ca,$b,$Mb,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$qg=$og.($pg!=""?": $pg":"");$rg=strip_tags($qg.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(61),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$rg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.2"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.2");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.2"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.2"),'">
';foreach($b->css()as$yb){echo'<link rel="stylesheet" type="text/css" href="',h($yb),'">
';}}echo'
<body class="',lang(61),' nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Vg=unserialize(file_get_contents($q));$Xe="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Vg["version"],base64_decode($Vg["signature"]),$Xe)==1)$_COOKIE["adminer_version"]=$Vg["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(62)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Pa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Mb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:lang(63));if($Pa===false)echo"$M\n";else{echo"<a href='".h($_)."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Pa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Pa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Pa
as$y=>$X){$Fb=(is_array($X)?$X[1]:h($X));if($Fb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Fb</a> &raquo; ";}}echo"$og\n";}}echo"<h2>$qg</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$xb){$Rc=array();foreach($xb
as$y=>$X)$Rc[]="$y $X";header("Content-Security-Policy: ".implode("; ",$Rc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ee;if(!$ee)$ee=base64_encode(rand_string());return$ee;}function
page_messages($n){$Ng=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Vd=$_SESSION["messages"][$Ng];if($Vd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Vd)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ng]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Xd=""){global$b,$ug;echo'</div>

';switch_lang();if($Xd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(64),'" id="logout">
<input type="hidden" name="token" value="',$ug,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Xd);echo'</div>
',script("setupSubmitHighlight(document);"),script("setupCopyToClipboard(document);"),"</body>\n</html>";}function
int32($ae){while($ae>=2147483648)$ae-=4294967296;while($ae<=-2147483649)$ae+=4294967296;return(int)$ae;}function
long2str($W,$Zg){$tf='';foreach($W
as$X)$tf.=pack('V',$X);if($Zg)return
substr($tf,0,end($W));return$tf;}function
str2long($tf,$Zg){$W=array_values(unpack('V*',str_pad($tf,4*ceil(strlen($tf)/4),"\0")));if($Zg)$W[]=strlen($tf);return$W;}function
xxtea_mx($jh,$ih,$Zf,$sd){return
int32((($jh>>5&0x7FFFFFF)^$ih<<2)+(($ih>>3&0x1FFFFFFF)^$jh<<4))^int32(($Zf^$ih)+($sd^$jh));}function
encrypt_string($Uf,$y){if($Uf=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Uf,true);$ae=count($W)-1;$jh=$W[$ae];$ih=$W[0];$Ye=floor(6+52/($ae+1));$Zf=0;while($Ye-->0){$Zf=int32($Zf+0x9E3779B9);$Qb=$Zf>>2&3;for($Be=0;$Be<$ae;$Be++){$ih=$W[$Be+1];$Zd=xxtea_mx($jh,$ih,$Zf,$y[$Be&3^$Qb]);$jh=int32($W[$Be]+$Zd);$W[$Be]=$jh;}$ih=$W[0];$Zd=xxtea_mx($jh,$ih,$Zf,$y[$Be&3^$Qb]);$jh=int32($W[$ae]+$Zd);$W[$ae]=$jh;}return
long2str($W,false);}function
decrypt_string($Uf,$y){if($Uf=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Uf,false);$ae=count($W)-1;$jh=$W[$ae];$ih=$W[0];$Ye=floor(6+52/($ae+1));$Zf=int32($Ye*0x9E3779B9);while($Zf){$Qb=$Zf>>2&3;for($Be=$ae;$Be>0;$Be--){$jh=$W[$Be-1];$Zd=xxtea_mx($jh,$ih,$Zf,$y[$Be&3^$Qb]);$ih=int32($W[$Be]-$Zd);$W[$Be]=$ih;}$jh=$W[$ae];$Zd=xxtea_mx($jh,$ih,$Zf,$y[$Be&3^$Qb]);$ih=int32($W[0]-$Zd);$W[0]=$ih;$Zf=int32($Zf-0x9E3779B9);}return
long2str($W,true);}$h='';$Qc=$_SESSION["token"];if(!$Qc)$_SESSION["token"]=rand(1,1e6);$ug=get_token();$Le=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Le[$y]=$X;}}function
add_invalid_login(){global$b;$Gc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Gc)return;$nd=unserialize(stream_get_contents($Gc));$lg=time();if($nd){foreach($nd
as$od=>$X){if($X[0]<$lg)unset($nd[$od]);}}$md=&$nd[$b->bruteForceKey()];if(!$md)$md=array($lg+30*60,0);$md[1]++;file_write_unlock($Gc,serialize($nd));}function
check_invalid_login(){global$b;$nd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$md=($nd?$nd[$b->bruteForceKey()]:array());$de=($md[1]>29?$md[0]-time():0);if($de>0)auth_error(lang(65,ceil($de/60)));}$Ca=$_POST["auth"];if($Ca){session_regenerate_id();$Ug=$Ca["driver"];$M=$Ca["server"];$V=$Ca["username"];$E=(string)$Ca["password"];$l=$Ca["db"];set_password($Ug,$M,$V,$E);$_SESSION["db"][$Ug][$M][$V][$l]=true;if($Ca["permanent"]){$y=base64_encode($Ug)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$Ue=$b->permanentLogin(true);$Le[$y]="$y:".base64_encode($Ue?encrypt_string($E,$Ue):"");cookie("adminer_permanent",implode(" ",$Le));}if(count($_POST)==1||DRIVER!=$Ug||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Ug,$M,$V,$l));}elseif($_POST["logout"]&&(!$Qc||verify_token())){foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(66).'.');}elseif($Le&&!$_SESSION["pwds"]){session_regenerate_id();$Ue=$b->permanentLogin();foreach($Le
as$y=>$X){list(,$Wa)=explode(":",$X);list($Ug,$M,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Ug,$M,$V,decrypt_string(base64_decode($Wa),$Ue));$_SESSION["db"][$Ug][$M][$V][$l]=true;}}function
unset_permanent(){global$Le;foreach($Le
as$y=>$X){list($Ug,$M,$V,$l)=array_map('base64_decode',explode("-",$y));if($Ug==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Le[$y]);}cookie("adminer_permanent",implode(" ",$Le));}function
auth_error($n){global$b,$Qc;$Ff=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Ff]||$_GET[$Ff])&&!$Qc)$n=lang(67);else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$n.=($n?'<br>':'').lang(68,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Ff]&&$_GET[$Ff]&&ini_bool("session.use_only_cookies"))$n=lang(69);$Ee=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Ee["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(70)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(71),lang(72,implode(", ",$Pe)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Wc,$Ne)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$Ne,$A)&&($A[1]<1024||$A[1]>65535))auth_error(lang(73));check_invalid_login();$h=connect();$m=new
Min_Driver($h);}$Id=null;if(!is_object($h)||($Id=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($h)?h($h):(is_string($Id)?$Id:lang(32)));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.lang(74):''));}if($_POST["logout"]&&$Qc&&!verify_token()){page_header(lang(64),lang(75));page_footer("db");exit;}if($Ca&&$_POST["token"])$_POST["token"]=$ug;$n='';if($_POST){if(!verify_token()){$jd="max_input_vars";$Sd=ini_get($jd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Sd||$X<$Sd)){$jd=$y;$Sd=$X;}}}$n=(!$_POST["token"]&&$Sd?lang(76,"'$jd'"):lang(75).' '.lang(77));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(78,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(79);}function
email_header($Rc){return"=?UTF-8?B?".base64_encode($Rc)."?=";}function
send_mail($Ub,$Xf,$Ud,$Hc="",$sc=array()){$ac=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Ud=str_replace("\n",$ac,wordwrap(str_replace("\r","","$Ud\n")));$Oa=uniqid("boundary");$Aa="";foreach((array)$sc["error"]as$y=>$X){if(!$X)$Aa.="--$Oa$ac"."Content-Type: ".str_replace("\n","",$sc["type"][$y]).$ac."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$sc["name"][$y])."\"$ac"."Content-Transfer-Encoding: base64$ac$ac".chunk_split(base64_encode(file_get_contents($sc["tmp_name"][$y])),76,$ac).$ac;}$Ka="";$Sc="Content-Type: text/plain; charset=utf-8$ac"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Oa--$ac";$Ka="--$Oa$ac$Sc$ac$ac";$Sc="Content-Type: multipart/mixed; boundary=\"$Oa\"";}$Sc.=$ac."MIME-Version: 1.0$ac"."X-Mailer: Adminer Editor".($Hc?$ac."From: ".str_replace("\n","",$Hc):"");return
mail($Ub,email_header($Xf),$Ka.$Ud.$Aa,$Sc);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$h->select_db($b->database());$le="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Mb[DRIVER]=lang(36);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$K=array(idf_escape($_GET["field"]));$G=$m->select($a,$K,array(where($_GET,$p)),$K);$I=($G?$G->fetch_row():array());echo$m->value($I[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Mg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$B=>$o){if(!isset($o["privileges"][$Mg?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$B]);}if($_POST&&!$n&&!isset($_GET["select"])){$Hd=$_POST["referer"];if($_POST["insert"])$Hd=($Mg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Hd))$Hd=ME."select=".urlencode($a);$w=indexes($a);$Hg=unique_array($_GET["where"],$w);$bf="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Hd,lang(80),$m->delete($a,$bf,!$Hg));else{$N=array();foreach($p
as$B=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($B)]=$X;}if($Mg){if(!$N)redirect($Hd);queries_redirect($Hd,lang(81),$m->update($a,$N,$bf,!$Hg));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$G=$m->insert($a,$N);$Ad=($G?last_id():0);queries_redirect($Hd,lang(82,($Ad?" $Ad":"")),$G);}}}$I=null;if($_POST["save"])$I=(array)$_POST["fields"];elseif($Z){$K=array();foreach($p
as$B=>$o){if(isset($o["privileges"]["select"])){$za=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$za="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$za="1*".idf_escape($B);$K[]=($za?"$za AS ":"").idf_escape($B);}}$I=array();if(!support("table"))$K=array("*");if($K){$G=$m->select($a,$K,array($Z),$K,array(),(isset($_GET["select"])?2:1));if(!$G)$n=error();else{$I=$G->fetch_assoc();if(!$I)$I=false;}if(isset($_GET["select"])&&(!$I||$G->fetch_assoc()))$I=null;}}if(!support("table")&&!$p){if(!$Z){$G=$m->select($a,array("*"),$Z,array("*"));$I=($G?$G->fetch_assoc():false);if(!$I)$I=array($m->primary=>"");}if($I){foreach($I
as$y=>$X){if(!$Z)$I[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$I,$Mg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$p=fields($a);$Dc=column_foreign_keys($a);$je=$R["Oid"];parse_str($_COOKIE["adminer_import"],$ta);$rf=array();$f=array();$jg=null;foreach($p
as$y=>$o){$B=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$B!=""){$f[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($o))$jg=$b->selectLengthProcess();}$rf+=$o["privileges"];}list($K,$Jc)=$b->selectColumnsProcess($f,$w);$pd=count($Jc)<count($K);$Z=$b->selectSearchProcess($p,$w);$ue=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ig=>$I){$za=convert_field($p[key($I)]);$K=array($za?$za:idf_escape(key($I)));$Z[]=where_check($Ig,$p);$H=$m->select($a,$K,$Z,$K);if($H)echo
reset($H->fetch_row());}exit;}$Re=$Kg=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$Re=array_flip($v["columns"]);$Kg=($K?$Re:array());foreach($Kg
as$y=>$X){if(in_array(idf_escape($y),$K))unset($Kg[$y]);}break;}}if($je&&!$Re){$Re=$Kg=array($je=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($je));}if($_POST&&!$n){$eh=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Va=array();foreach($_POST["check"]as$Sa)$Va[]=where_check($Sa,$p);$eh[]="((".implode(") OR (",$Va)."))";}$eh=($eh?"\nWHERE ".implode(" AND ",$eh):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Hc=($K?implode(", ",$K):"*").convert_fields($f,$p,$K)."\nFROM ".table($a);$Lc=($Jc&&$pd?"\nGROUP BY ".implode(", ",$Jc):"").($ue?"\nORDER BY ".implode(", ",$ue):"");if(!is_array($_POST["check"])||$Re)$F="SELECT $Hc$eh$Lc";else{$Gg=array();foreach($_POST["check"]as$X)$Gg[]="(SELECT".limit($Hc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Lc,1).")";$F=implode(" UNION ALL ",$Gg);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$Dc)){if($_POST["save"]||$_POST["delete"]){$G=true;$ua=0;$N=array();if(!$_POST["delete"]){foreach($f
as$B=>$X){$X=process_input($p[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$N){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($Re&&is_array($_POST["check"]))||$pd){$G=($_POST["delete"]?$m->delete($a,$eh):($_POST["clone"]?queries("INSERT $F$eh"):$m->update($a,$N,$eh)));$ua=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$ah="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$G=($_POST["delete"]?$m->delete($a,$ah,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$ah)):$m->update($a,$N,$ah,1)));if(!$G)break;$ua+=$h->affected_rows;}}}$Ud=lang(83,$ua);if($_POST["clone"]&&$G&&$ua==1){$Ad=last_id();if($Ad)$Ud=lang(82," $Ad");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Ud,$G);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(84);else{$G=true;$ua=0;foreach($_POST["val"]as$Ig=>$I){$N=array();foreach($I
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$G=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ig,$p),!$pd&&!$Re," ");if(!$G)break;$ua+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(83,$ua),$G);}}elseif(!is_string($rc=get_file("csv_file",true)))$n=upload_error($rc);elseif(!preg_match('~~u',$rc))$n=lang(85);else{cookie("adminer_import","output=".urlencode($ta["output"])."&format=".urlencode($_POST["separator"]));$G=true;$db=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$rc,$Od);$ua=count($Od[0]);$m->begin();$L=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$J=array();foreach($Od[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$L]*)$L~",$X.$L,$Pd);if(!$y&&!array_diff($Pd[1],$db)){$db=$Pd[1];$ua--;}else{$N=array();foreach($Pd[1]as$s=>$ab)$N[idf_escape($db[$s])]=($ab==""&&$p[$db[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$ab))));$J[]=$N;}}$G=(!$J||$m->insertUpdate($a,$J,$Re));if($G)$G=$m->commit();queries_redirect(remove_from_uri("page"),lang(86,$ua),$G);$m->rollback();}}}$cg=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(48).": $cg",$n);$N=null;if(isset($rf["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($Dc[$X["col"]]&&count($Dc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$f&&support("table"))echo"<p class='error'>".lang(87).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($K,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($ue,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($jg);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$Fc=$h->result(count_rows($a,$Z,$pd,$Jc));$D=floor(max(0,$Fc-1)/$z);}$xf=$K;$Kc=$Jc;if(!$xf){$xf[]="*";$rb=convert_fields($f,$p,$K);if($rb)$xf[]=substr($rb,2);}foreach($K
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($za=convert_field($o)))$xf[$y]="$za AS $X";}if(!$pd&&$Kg){foreach($Kg
as$y=>$X){$xf[]=idf_escape($y);if($Kc)$Kc[]=idf_escape($y);}}$G=$m->select($a,$xf,$Z,$Kc,$ue,$z,$D,true);if(!$G)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$G->seek($z*$D);$Wb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$J=array();while($I=$G->fetch_assoc()){if($D&&$x=="oracle")unset($I["RNUM"]);$J[]=$I;}if($_GET["page"]!="last"&&$z!=""&&$Jc&&$pd&&$x=="sql")$Fc=$h->result(" SELECT FOUND_ROWS()");if(!$J)echo"<p class='message'>".lang(12)."\n";else{$Ja=$b->backwardKeys($a,$cg);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Jc&&$K?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."' title='".lang(88)."'>".lang(88)."</a>");$be=array();$Ic=array();reset($K);$df=1;foreach($J[0]as$y=>$X){if(!isset($Kg[$y])){$X=$_GET["columns"][key($K)];$o=$p[$K?($X?$X["col"]:current($K)):$y];$B=($o?$b->fieldName($o,$df):($X["fun"]?"*":$y));if($B!=""){$df++;$be[$y]=$B;$e=idf_escape($y);$Xc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Fb="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($y))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Xc.($ue[0]==$e||$ue[0]==$y||(!$ue&&$pd&&$Jc[0]==$e)?$Fb:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Xc.$Fb)."' title='".lang(89)."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(43).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Ic[$y]=$X["fun"];next($K);}}$Dd=array();if($_GET["modify"]){foreach($J
as$I){foreach($I
as$y=>$X)$Dd[$y]=max($Dd[$y],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".lang(90):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($J,$Dc)as$ae=>$I){$Hg=unique_array($J[$ae],$w);if(!$Hg){$Hg=array();foreach($J[$ae]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Hg[$y]=$X;}}$Ig="";foreach($Hg
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Ig.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X===false?"f":$X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$Jc&&$K?"":"<td>".checkbox("check[]",substr($Ig,1),in_array(substr($Ig,1),(array)$_POST["check"])).($pd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ig)."' class='edit' title='".lang(91)."'>".lang(91)."</a>"));foreach($I
as$y=>$X){if(isset($be[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($Wb[$y])||$Wb[$y]!=""))$Wb[$y]=(is_mail($X)?$be[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Ig;if(!$_&&$X!==null){foreach((array)$Dc[$y]as$Cc){if(count($Dc[$y])==1||end($Cc["source"])==$y){$_="";foreach($Cc["source"]as$s=>$Mf)$_.=where_link($s,$Cc["target"][$s],$J[$ae][$Mf]);$_=($Cc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Cc["db"]),ME):ME).'select='.urlencode($Cc["table"]).$_;if($Cc["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Cc["ns"]),$_);if(count($Cc["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Hg))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Hg
as$sd=>$W)$_.=where_link($s++,$sd,$W);}$X=select_value($X,$_,$o,$jg);$t=h("val[$Ig][".bracket_escape($y)."]");$Y=$_POST["val"][$Ig][bracket_escape($y)];$Sb=!is_array($I[$y])&&is_utf8($X)&&$J[$ae][$y]==$I[$y]&&!$Ic[$y];$ig=preg_match('~text|lob~',$o["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$Sb)||$Y!==null){$Nc=h($Y!==null?$Y:$I[$y]);echo">".($ig?"<textarea name='$t' cols='30' rows='".(substr_count($I[$y],"\n")+1)."'>$Nc</textarea>":"<input name='$t' value='$Nc' size='$Dd[$y]'>");}else{$Jd=strpos($X,"<i>â€¦</i>");echo" data-text='".($Jd?2:($ig?1:0))."'".($Sb?"":" data-warning='".h(lang(92))."'").">$X</td>";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$J[$ae]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($J||$D){$fc=true;if($_GET["page"]!="last"){if($z==""||(count($J)<$z&&($J||!$D)))$Fc=($D?$D*$z:0)+count($J);elseif($x!="sql"||!$pd){$Fc=($pd?false:found_rows($R,$Z));if($Fc<max(1e4,2*($D+1)*$z))$Fc=reset(slow_query(count_rows($a,$Z,$pd,$Jc)));else$fc=false;}}$Ce=($z!=""&&($Fc===false||$Fc>$z||$D));if($Ce){echo(($Fc===false?count($J)+1:$Fc-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.lang(93).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(94)."â€¦');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($J||$D){if($Ce){$Qd=($Fc===false?$D+(count($J)>=$z?2:1):floor(($Fc-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(95)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(95)."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" â€¦":"");for($s=max(1,$D-4);$s<min($Qd,$D+5);$s++)echo
pagination($s,$D);if($Qd>0){echo($D+5<$Qd?" â€¦":""),($fc&&$Fc!==false?pagination($Qd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Qd'>".lang(96)."</a>");}}else{echo"<legend>".lang(95)."</legend>",pagination(0,$D).($D>1?" â€¦":""),($D?pagination($D,$D):""),($Qd>$D?pagination($D+1,$D).($Qd>$D+1?" â€¦":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(97)."</legend>";$Kb=($fc?"":"~ ").$Fc;echo
checkbox("all",1,0,($Fc!==false?($fc?"":"~ ").lang(98,$Fc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Kb' : checked); selectCount('selected2', this.checked || !checked ? '$Kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(88),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(84).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(99),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(100),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Ec=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Ec['sql']);break;}}if($Ec){print_fieldset("export",lang(101)." <span id='selected2'></span>");$_e=$b->dumpOutput();echo($_e?html_select("output",$_e,$ta["output"])." ":""),html_select("format",$Ec,$ta["format"])," <input type='submit' name='export' value='".lang(101)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Wb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(102)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(102)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$ug'>\n","</form>\n",(!$Jc&&$K?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($Q,$t,$B)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$G=$h->query("SELECT $t, $B FROM ".table($Q)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$B LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($I=$G->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($Q)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($I[0]))."'>".h($I[1])."</a><br>\n";if($I)echo"...\n";}exit;}else{page_header(lang(63),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(103).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(43)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(104),'<td>'.lang(105),"</thead>\n";foreach(table_status()as$Q=>$I){$B=$b->tableName($I);if(isset($I["Engine"])&&$B!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$Q,in_array($Q,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($Q)."'>$B</a>";$X=format_number($I["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($Q)."'>".($I["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();