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
h($A[1]).$Yf.(isset($A[2])?"":"<i>…</i>");}function
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
as$B=>$o){echo"<tr><th>".$b->fieldName($o);$Db=$_GET["set"][bracket_escape($B)];if($Db===null){$Db=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Db,$gf))$Db=$gf[1];}$Y=($I!==null?($I[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($I[$B])?array_sum($I[$B]):+$I[$B]):(is_bool($I[$B])?+$I[$B]:$I[$B])):(!$Mg&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Db)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$B]:($Mg&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Mg&&$Y==$o["default"]&&preg_match('~^[\w.]+\(~',$Y))$r="SQL";if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Mg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Mg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."…', this); };"):"");}}echo($Mg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$ug,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0(\0Z\n���|\"�ј�^=�HdR9\$�M'�J\$h�V-9K�%�\0�	)�NgS���}?�P@�`:^������\\��2-K T*�V�W�VdR�D��M�=e�	{F�-�K��Mj�o�\\hR�D�/~�%�kd^V.K�R�՝݂�bqX���9/c����\n��e�Գ4B\0�=&�G/K�����3/�5��XX�4۽�^U�إ��a��DT����egeK�ާVu/6�ߒ�T�{ը�@r�>�	/��]b�\0V�����ܼO��sr��J�@b^>>ai���P\nN�%�^q%�	��x���x)\n:�b��A�a��C�*T�0ic��)�b'�x���	y�,�AhG�X%�����*���ZS<.T��/�j^kH)x_'��x�����ԗ��P�/.\n�B��iy��#F��)7@I`*��iy��7S�����aʗ�\"��\0��H�IDu�%����t{��%���K'�xiL���9(%��_A��:�4UH-G/�X_<��W=ix�����O@��B���;|�u\n^`6�:^t%�\"^襏���`�?����%���\0��\0-���Zȥ�@�!���L)at�\n�\r◎iyҗ��bX?�xP��ix����|d�%�JX����>��p(�s2�(�����^^'�����^dB*��NXv��j~�@��@��y����_����p�I\"_I%�n�I|��J^\"��c�����gahs��R^;IxƔ��u����*^o%��v���y�%�:X����J+�U�a%�pI�2^C%�z_>�id���[�%�J��n��,�w�ؖc;�^��h�%�p��?�y/�aq�[��k����\r}�O%֋t�Xإ8����z���;���8k֏�i`9֒+.��Ic��&�*^Iv��Z��p	���l�j��d�KKJ%�H��X!�88@���f`I`�%�Q��rX�-G����\0K�	//��BX�yD\0ļ���_��?<'��!X\"�/H�֒��˔:�\r\$�v\$��j�������'��KǢ,İ)\0Z�h�h�5K�����G&a����Kɉ,a��<BA��Ixu%ᄗ�H�8-E ���b�I`�%���_d\0-��J��Z�,\n�T,�w�K:Z��7)I:K|����2XSD�%��Uʠ[+i�ҺX_ ���R�^�q/���%��\$���0�D��D�V��;Ah�F҉�6�r��0-h0��f�ݛ⬗��^�RA/\n�~p�VK�L�S�z�lCq/\n��~��?�/3B|��\$�TI�%�q�Icc���Ż\"Bg�&���BX.y,ld��\$��K�-nh��NK(I9|ؗ��^(�!}.E��gBV�-+<�Y9������R�\\�uUL��h�,d�����RIxf-焺��4K]\nPRi,����?9+��,f�N*�����w�@Z��� ���H��hV\"��F�����`k��\$��w��\\�-s�����BY�\0Du���5`	*�i�g8�_E!��ơ�L<`ΝD�%H�l�EQ!:��\r��~?��\$��K��7�D��!�q�`����5X���Uw��I�І�	xsA<���K�a/�ʖ�@q��-P��^�Wk-�@�b\"�B�/�\0��Q󰚨}�y,dK�����p�-.�e1s	�.%�]0jjK�A/�1H2_\"�kۛ3n�&�3�`ضA(���3�	`��,H�ۡ����%�L��xi�G�>��u�\\�-6�,6���Mz�\\Ϝ\r\$���(-�q������#��	2<�EAh������K��jı�Ȣ��.	\$�^�rx��x-���+:����X-Z��w��<O1.U��e�(-?���/���0Zۏ���D������p�jZ�^�ZZ��D�f�݌G�xA,�_L� Z�Ah�YS����У��D����K+���T�Y�Ykt2p��&_�`57lS\"�K�,Ǆ�#ɛ�s�T���\"����5� �����Ak��#ƣ���x�ľЙ�x��n@��`(��/�`�Lܨ�n \$���K��f,��I�UV���߬�藊�_�KDŦİ=�B_���AA�WN�,�`v���nK�T�8���v^����x�i�S�v������ß��jk%����̡�S�Z�&���z�}����i�f�=_���\"�\r��!��@���^��g���AyoM]-���_�?�Zw��Z���KZﻞ̒��|?���C�x\0���\0���@�?����<x��?\0���?|�������p������?������C����������X������/����/��o��������`~\0�����!�p0���~�������>Ͻ�}������]�/�\0!���'��k�j\0���k	��	p�	��\"���j�������|\0��\0a�����\0/��x���\r����� ��������o�����/����!�#\0q*�O��o|�\0��\0��\0�P�\0���\0���������\0a\0�a�������|");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n��C���o6�C����(\"#H��a1���#y��d��1٘�n:�#(�b.\rDc)��a7E����l�ñ��i1Ύs����54��f�4�ngsI��hM��д�i:`�,��]�����Y��t�L0hD*B0\rF&3��x���s���'��[Ʉtv4��S%��0XL���W5���)�Y��f��\r^�=~9g0�\\@���r�Q�Nn�^��yN�j{�o�p�C%�ʋ�GS��Zh��5Z�|>:��'���b{�J)Ɠєt1�*uS=^���2*�8t(�0R,�8�j:�x����@9�\n�@�1\nJ��#��4��BR�J�����Fƈ�0�#�\"B2ǋ��>#�����J����`Ia�a�hbC0\r�4A�r�&���\nB��54�\$>�+Q�A6Do�MEL�F��6����=���9D�LW;����H��f�*�K�.Ij���E��\"��K��5��6�ڸ�,�#�o�-P�u-Z�A�\\�(R�|�9-H@�0�\nxt�W�(��o�����>+�ܾ����;5D��8e.��g\r�o=�Ax�:)�P�T�3د��Ahݭ8άk�k+[�ͽp��{Y�=Ar���s>�s��c\"�:p �8W���78�Z��#`[w_a�*8`ĵ��r��\$S�<��d�]Z���4C��r�����fAo\rW#��6���F�'�=��\r���Rg���gMZ~��mN���x�����2����W6>\$T{g H%Õ�2Z��mm�\\�~�u�΍IV��,876�yP�+ݐ��ir`�,l�6�9*��:��`��B�v��䚮Q�kZ�0��#�����A���u�s3#�ٌ [+�\r㽫�C^�?�ϐ:���:�-�;��G��{_l��{�wW�l�\$�h�������s�y!�0���H���%)I6< �l�XTI��:��t!�2��Nèbk!������(-�N��%xROT4,ma���@����@A�߼�\n�mmM��e���k�L4�V.�b(`����7A8c<e��W&�dB�ٹ1@�Ŋ0 /l��T���˧\r�����C�_*�2�'��U�-�	��\\��yc&e�@Pu\"̆5�h��s@�RC>�C��phkE��%'��\$ᰂ��ǎ��;R|`�]�p����&B �yG\r�?B��2�q��¥�{ee��L�fe3�1����S\$�ۋZ�l����j�Qb��W�:s�sM�?;��u	����MH�yM�0�0ن�C3{�\0�\0�ݨ;\$eId6hܡ��/��2�2��-#h�7L%��#첣�x0�\$�/��8�CD�55�����K2;9fSEZ%Ɩ�4Z*��Ѓ\0n���&�ڦT�S��n��2��j�6W*���\0\\@��q��`k[�t���hņ�`et#&rn�:�벱��־?�ֺX��(�r����誌>���M��G��:n#2�{%4��Q�|�{?!��Fi�����!��T��T�V����B�q�̀�xn���ű�p�A��-�_:��o\$�M�\rE��Hz	�0�`�r�u(�o�� 2H`�U���w0�����㽇��?��\"����Y���I[��ҫn�8��jN��'!�<�k�V\r��\$���d�Yq�*l\0��CuHq�I�ϗP@�6H�jB�\\�H>Xc���N���CH�(& �d<�\rr .�W4�Z}�	U�n�pQ�B�\"db`\nAa\"\$`�*�we�~)p@� @턩�b��)Y@�1>i.�\n3F�1 f���5����he�S�o͹BC9��7c�PPv+��B_�Ƀ�A�7�D%7% a\\�/ ��U�O.��PP�THeR*vQ���iu���YZ���/Xr? �,1��dl��p-�Zŕ��h� R��A�ܝH�\"\r��U3,:���,�b�\r��,\r!X!���K�D �Ђ��U\r*�}����� ,���}Cpr\$p�B�WA()�0�xG	���\"�^I�x7	\n<����S˂(Dߡ7��~C?1��!p��B7;|�p��:U�!, ��y3�|���І�HM�< !xHa!��t��\n�Oi<������S��焅p�ۂD�!�B�I�A�&�@���^�!\$;���A�M��ȅNq�B�6	�,�^z�B���s����k\n<����0	�G����y@�-\0��PA	 3��B�M	�&�`��B�i	�D� �(I\n�'��OC�F\n��(���X7\n��,���0z��L#��XD&�pb\n����	\0���\n �� �	���������j\0��p��\n\0r� � ����\\\r��DPX\0�\nC2��\n��@���+��@l��	 ���\r�l\0�	`����h����@f���@���\0�\n��	 � f+�p\n`�\n�8�h�f\r\0l\0r	 j��	��\n���	�V	@�����\n\0�\r@b@�\0f@�p@hB�	 �`�	@�� f\r��\r��\0��\n��	 ��� �@j\n �@�\r\0�	�4�`�`b�p\r\0��� �	`�S����	m�\nm`��� �\r ��@�\n@�\rO�\n��\n@�\n\0V@�	\0f��\0�	@j`�@�\n��@� �\n ��^�����bp6\n��\r(\n@�\n V\n��@�� �`b���V �@� � ^\0��`\r��`�G�\$@� b��\r �\0���\r���	��\n\0�� �`��`�o' ^\n����P:\n\0l	@� �	�p�`	�f\r�r��`�`���	g�0���\n������0�� �`� p�@��@��(Έ b��\n��0 \r\0���\rOv\0� �\n@� �\n���� ��@�\0�\r �2@�@�\0��,\n�r\n�i\r���	 � �\n0�\r�l\n��@�쀜W��\r��-��\r��`�	�����@���`���\$����\0��N\n@���T��j@�K0�\r���e8��\r��>`b�����%`���EO�\n@�\n\0�	@�\n���`�P@N�*r��� �3@�:@�	 V`�3��\r��\r��\r���]?�����`�\0�@�-��\r\0`����0�lB��	�B`�\r��@���\n��0�0\0�	 �C�B	��	�j@�<��BtV �\r3�\r���@�E�b�����\0���e��DS�\r �`�	%t8�o�EUE��;�}7�~ �%���X	�b@�=��8�\"	��RN��\0�0\0���Q�SG �	o�O��<��>��	�`\n@�T�@�Q �	��.\rԁ2S)2�04��\rt`p\0�\rU;���v\n��\n��\n��N�5���Z����\r4�L`�P\0�EtZ\r`�UQ aQu`�0`��Hu U\n�V\n��K\0�R�����C��\\���\n�@��V��Wt�wR ���9^�\r4�YO��;�E�a6��\r�!bUoW5wW�'2�/25�*�_e �S�AT�L��U2�Us�\r�\0��QU�=5#=�wR��R�055S�uT �T�N�6�\n�aM\0� ���\r�\0	@�h��@dy��	��S�5�8	��X�@�����2`��n��b�	��	 d	����U��lD4�kV}3S9k���3����h\n��m�=T ����\r��\0�1`�\0�\r avsz\r \n b	�b��\n�7:�b\r\0��O@�\r�	�\r@�d6@\0�q �\rpA6�2�N�M6�l��K7S'�WR6o;�8�Wg2�d	��Ϥ\n��\r`�@�xR�3�l\r��7���a��IW�	 � W�@�C����6׏mե`km#a6��\0�\n�K�A6��O�>\n4F@�StCN��� 	�l0T�s��%�4\n��\n�-9\0g<��0�\r@�}�V��z4�\r@�7�?��	 ���A\0���Z��v�R�Մ��/��`h@�:�z�wH\r�8\r@�\n>\r��K ю8Ʉ���V�o7�E�d\n�v �bV�@���\r�v�n �<`�F\n� �<�H\n����\$�\n�O0�O8����@��.e�V�\0��vnd\0��\0�Ot��S�Y�go@�kz��Ay�@�@�6� �	 ���ࡒw�	ײ\r݈x\"\r��CvT�qNtG8 �\n��kyŜ�P�g�oU�aVS���8x�)\0d���6��\0��Ub�	��2X7��q%v\r��Q�Y�u�W�`ЄS��:h�>x3l\n/\"\rU��v�x\0��\n�iqOe�r4�2���@�I,\rvSl/�Q\\�D�����X(���k�t^\n���\0�?9�ٞ�o\n�`��/|\r���X��v�x���\r�<�d\rь��Y��7r	���\n0\n���@�\r�3/��:��L:y���A��\n�d\n�7���X������s(y���\nL�;M5�M��Q4��(�	Zm���rJ`��;��<�ɰ՞md[q�;k�;w�[o��y��{�{�������;�������ۛ�{��{��������;��;��{��[��`��;������ü�Ӽ���׽�Ѿ;վ[ٸ�����{���;ǿ;��|�{�������|��	�<!������|-�<�[���1��5��3��=�<I�|¼;�<A���ÜW�\\K���\\eƼ_����qŜw����cǼ��:yƜ�ǜ���u�<}����ɼ����ěT�^�qy�d��\\��\r�3z`�@j\n�ɝ����	@�%���������������@�0#������\\�\n\0�� ��x�\n�\0��`��>\n2`\0�\rn%��\0���\n��%\"O���p:\n��P�@�\n ��@���V��@��	��\n�o��\r@d\0���\n��L@�	z��j\n@�`��|y��	p�.dXm<\0�#0\r\0�	�`#`�	��Q���@�Ӏ������kC@�	+���@� V��\n�6\r\0jvS߀���G��̽^�\0�	@�\n��@�!�1��h��6�\r��r�	>+# ����\n � j ���`����n���	�p �E��zSF�њ@� ��@���@�'`�	�s�n��@�!��3]�\0�p�����޾\0r�@d ����\0�`��\0�	O�\r��Q`�\n � h����Hৃp�(`�\n��\\�\$枤�h@borg���-|�\n o�@���	 ��@��@�\r@���� l\nc�7W� �\r�s��`��`�@�&`���@�@o}�OJ�@��x�X�?�\0��[�	�� � �0@b\r��`��\0ٙ���k�c[ �\0���.J\0թr����@Vp�:�u�r����2�<`KE� �ea:h,���'�	�xx�F�8��8�@p0%�d BGp\0��P9��7�Oj����B3U،��(`;��`wc��4�!�6��� 5\0�\0HH�Ҕ6e\\��GL�@����d�qp���%}�f@���*t xm2@�&U�-��F�l�7� 	!9m���w�m�Hy�\0p�6�|\n�L�\0즓�����9zAG61�F�N(@�`8�b�p��'�,`/8���`7��\n`6�@�v�<�u��y��U����f~�\0�4�6�xM.�)���T��\0��p+�R����t5��\r@9S��`��E���y�@p�\0=)\0FRR�P8����>���[�`x���G� �ޠ5A���`!�L\n C�(���u�b�;�\0��p�`�#إ`\n`L@�ԃ��\n	�h�^�� L��Ð7;q�Gys7���%��\r�q{0��B���@�g�@�\r�T�\r���8�,�Ɋ����6��p@�@'13�NT��6���k�KhW�@D��.Z\0���'D8\0Tx �\rS���	`v]��05��@BO\0���(��\nm�����<�@7B��\0�W�\0�\0v]+�����:D�1uy�\0�@3P	�hAb@��A���f�D6�(��J�B@�K�@\n@t���d_�M�\0R��\0j�-�\n\0s]jZφ��l	@js�����ե�K���D((�\0r�rN� &\$�,,6J\0\0�H׹͂�h�Z�n�\0���8z#a,��j#��Q�����1A`n�����\0ث@/����\0)���0���sp6C�\r`S�a\"0T��h@@�8AL#�]�v�ۆ����!ȯ	�=�|D#C&A���IP�@ ��M p9��V��	��%���tfb����d&Y4\\C�.���\\\"(�OEw\$�i�����5\\��;)5�(e�/d��TA�@J�!�%VSSnʘ\$d0)���g2W�6|���k^��ہ�6�U\r�n \0����0M�nЋ���&�7����o�����8!��~o�0� +	�O]��7���.s{�_��=�	K�`@��`�	�Qyh@Ș`�\$0R����0�\r�'�\rO���p���V˦C#�H.x���2�i�J8@�4��@S����0(Y��Y�6��s��@U`���J�� h�����0�d�|@^�^��(��P�\0��2� J>��R�gXD�@�bQ,Of�69�M�mSi�d�&�6u�<�1x\0�� \" t<k�@�� !�WtJ�g�7�8 c�:^\0����	�p�9B����`O���Υ㦨l\n��B_O\"����G�gf�U��2�������D�\$��C�@��&A\r�q��*�Ww�m�bSҚ���\$z<`	cB�\n�Ɛ�)��f`\0=\rͲ���\09\0�\n) ��xt`4����M\0�!�!��(`/��p%<�\n�+ć��o�߿\r3��W\0����#<v7�/X���p;��#�/������8B�G���@��Ɓ�*\$} ��@�!\0�\"?�t�������>@���4�}K @�G��\n)/\0j�8�7S�y��bOA}\ns�y�\0`~�\"�\nJ,:<qH��)��(Ј�ՠ�,D�f /��x�7�8����ɰ�IxHR	����	`1H@ʓ�14���h@�`\rA��C�\0�\n�wP�.\0��( <�\r�H@��[L��J��+��s����9����B�+�3	*N�Q\0 ��&¤Ӟ[ؚF�	�m�1\0��0!���!DJ�� \r�K��,I�R�@��0��\0SJ�h\n\0\"�H����\0� ;\0��O�/�r����b�\ri�,\0�PqW�����7�E�A�S(�3\0�pA�\"tR\0002��*��)��lP*\r'�{z)�Z8��x�yh.��h!?[�R�S�!�\$5=�Y��Y@60\r���\rQ���%=L\08P\r��\$�I#1+���2���J#E(¸ħ���P��_���X,>{��?�\"�\n�8h���>�X��`k~� ��\0o�P�\$�GX�.��0)��W4 z��6���=��@X @�����\n�d>����4����7���5�%aP��\rB��y�J rD(S�4ȁ�\"JhQ��7���z@�\$���:���̀2�l1O��J�Jv�*rL�/���)&,\r�3E��E�(`.�h\0�\\�!�L\n�J�@�J�p7��y�J���*���:\0� e8@���_\0���l�]� 5�=�ȯ� �~�z�<\n�`8V܍�7�M#4��;\0�P8�\r�T�_@���R,`3�\0l���4��Tv�\$X�b��yL8\r@���.�z�<��`%AQ	q�\r�������\n�a;������J��p�I8�:zo����\$�E�^\0�h[G�\ntz��@1	r�YpkH �K���At�!~P9�4	��s2�H̪&�n����Y��:�W��Զ��U�-ok�Xښ�������ck]�\r甫�\0��;;�v�?�.�4��h:��s���q:9�%�	���@�z����4�hSL�����&���[���_�X)�jSZ�(��K\0u��nz���V��n:��R�#�juϺ	\0���;M�\$`M�bU��W�\"1\0�=V����T�)(� D�����\$M����ӵ�Vu�?4\r\0004��B�7���-{zH�h.�\0~��V���	�.�1�Tr9��0��`HR\$��3�\$!6��k��dq'<B\r�D���\0�� 6��\r��(\r\0l��\0�2@W���P����_>�X�(�@�����\r��03��l���~&6�\$1�<c@�X !�:�5����65�^��U��-��;X;�HN��9�u�@�z�^���ڽE`�ʞ\nH��T��E���[�4@kj��.��ߥ:6xv8\r����N�[hS�9j`��\$	����/�#�K\0o���W\"֬��5H�\0��xI:ij���nV����d(S:�\0/ju�J��\0�pN�I�؝�\0i.�@�)�cg��2�����=R �;�����c��*�`�J���@g��<��D0(|���-��t��>���\"\"��&:�Z�v`�\0�2@5_��X�rTߌ0-9d	�s[�@�vZ��7����\0��,�!��\r�{`WD%20@/Ls���(��S(	�%�i��^\$7a��@�@,U�-�g��V|�\\[�V��U�m[�dbR��8[���;V���uT*�N�{����TnH 5��5C4����]��� i08�����'X�%���\0Mx\"~��հ�&q]l�B���]�;o-�����c%:� HJ42�V�?��0f0\"�Sӟw��S(��\0��{i�J�,�|3��S@/����@BT�RRw\$7���@G�f�gV���`R^�3�p�+�H�gz��t���o�fu�!B��N�0qQ��a~�2;\r�B�<�^L�����\n��\0b�7�4v��*!9���N�^�\r��z�\\�'�2NP�ԃ�`*�Y}ZL���]��jJW�@�ozH����O�����Ewӂj(�v���9HP\r��H8��4ePXmG��0	��f��_��S(`/�Y���#�Ā\0b�\r������7�Uk������(6&@�l�+3Qߊx|��ˇ� \0�#@8^Y�{1R���w�l�@ڭ�75-#h�S�\0�d�\n�' ����Q)pPe�e(\"�4��h�RK����C (Д\r@Z�H�~\$������Nↀ�a�:\0�\0Ox@c螮�i�u�����8D�M�f���\0���E50�`%�`�=PX���c]�\n�!,0�R�J�4����--�܀U@�\"�/d@8�x\0�09_�� fC@��p�+\0�:��H`_t�::g�4n`��`3���0���l��5\0��y�`\r���W01\\�����	���ANN���F#U�1�y��!a��a`	2K֢���Gj7R��~�u%�mH�D	�)B�k\0���}��iښgP5�b`= ���G)�{�oフg�*R�jUB�p�%[*�a�VR����%vl��6W��69��3�`� ����D��mi�<�����oc|�߆�����\no�o��\\/ۗ�N���79�#R�s���� �\$������O�ƙ�	Ϭ��<Rl���OƐc�Hro�);��N.��1�\\d0\0��q��T	,\$1ܪ��,	�i� r�fy�g+x@�p\0%6h΋@n�8����vBM����� ��	#~L����9A}sk�~�&�m�M�j�Z�P�mR%\\6.Bx�`�ZP2>��4@���,���U����ͤ������9�Ё�p z\0�s�,nS���M3Ӆ��I�B��#c�C&�C���[�7s�	�L�N�Cv�3A�\r�TPl�dZ�\"��;��h\0r03�\"�`X�m\0d;�0	8�k=�����*�vV��{<V�d���LУ[����(ihJe�N�h�h	0p��][�>e4?lC�_,�Dф\rby���qWՁ����!_a��J�@A@� 5�n�n�����yF_ٝKf825���)�	@2?@1JY��~HBx������SO��]b\0�Ȁ����(��T�,�g2`3��\r���NF�	�%<HQ�V���X�\$�z���BPh/<�R�i&{�MD`rJk�}�Ny��j�4�c��6<!]��DE]8�#���ԕ�������}^G�� @��n4��|�7�TS���^`6N����P\"�}zo=A0�͵�܁�������#	f�2@g F�Xxnx��p:�F	�L�e�E ,��x7���R�w,�R�������:�p	�Z#\"e���G�CW<��B؝� 	��M���K�n+gF�\$J�@9����KmX�xvCr�iI�\0�e#�<�,�d��\0����\\�G���P�:\0���s�7n�?t��	�\n�����1����?0�tP<#Ʒ󂲧(�R�4���������. :��VLF�\0f�m6�A=�\"w�2\0�/�{�@��\0004\"��sy�@�K��@f\\rU����ŎǠc�+��L�t�Y��xp_<;��\n	���t�A^\$������h\0006��Ѹ�4h��0�h�CZ��6�\"�K�`8�;�\0�`9��\r�\0\$%^���;�	����[Ǵ]��(wn5�%E�5��|��P#�*ap�x�l~�R��č7�`=#E1ȯ�q����U�&PJy�Q��*\"������a��\0\$nV�@Lz��@�����y_���\$�e�èD����7�\$�VF����l���si�^��--�,�Dh^E�l�V\n�@t>��α�\n�hw{\$�ϠL	hs�����\$H�.Ʉ���@J�<��Cx���7����Cc�74�\$1_��G���*{5��\\�	�\"Dyh�)V�9��M*&`���\"�9Ĩ�%��fQk���f��R�M@z�������.*�	�Z@�^�<i�`ƈ2�{���;\n��@�87XP5�H�@�K+J{I���@�#�-D�iKen�@\"��W@5�5�P�a�,wO�G�A�_:�\r�<������8�#�3Ii�l��0��E(�s����y���TX@����Ԉ3V�h���Л\$�@TKr��0\$�5-�q��猼}&.	�h�&t��P6P�`Z#�qQ������m6�R��Q��y��Jp�\r�C�I-D:\0��6e|��@��q}��c��#�������n�><�P�D1mYC�:D޿7<���I�Q1`�\0�5�\0\0��<\0	�6��]�W�����<��>{�|���E�O�>�������N�?Ծ����}O��L���>��ϫ�G��[���~��/�}��_f�g�>��_��|\nO����^Ջ��ʐpX\$Op@p��Ry- w�Vq3���ư��ů��I�G@�F�ך)48=d�d��U�@W�����D9GN���N��3�J0��0Qf�'��>���_�\\BE���|�Y�b�A���\ra�D\0���M4M@����1�Ҭ@Ԉ��i[H�pRx[W�k:�#��mX��x2;���8��Oũ\r��f�B��o��N�����������0p��@�P?� \"bpV�P?�G�L/��D\0O��0�N���3����@�B�kU ��0�(��ZQ\n�Bt�E`9��X[jA'�y4�\0�C�\0&!z��������pa��&\0b��#�<�7��Hw!�^\0b��lN��D��'�B8�*�L4���q.��&QD��]h\r'J����>������w\0��8P3�2�K�K������:K��j2���i���z0Ǟ��v0n���� ��B(M�\"\0��A&ⷧ��+N͜�8��Xm\$j\0���[Aq�P^�k�0`HR��(^�p\ro�3r=`��L���bIȅ\0N�sV�5f��M\\���O���x�X\r_��ֈ�@���#X�C��sY�5��XI_5�78�d����ݍm�����Mo���[#��2[Ä��<�ߩr�x�t5�s�·;%�����L���_����\nd���	[���N�xIy���@+�BX	Nx\0���� 5lP�\r\$��F*iE8���\nF��6�)\0���l8\n`3��Fp��!6Fd���G,�{�s4�P	����9\0��M���+`��\r�(\0��¥���|#R�2Ԥ-P�5��}�:����g��Jv������1�\0<(|k�����X_�\$�\0�JJ��u�4#���e٨�}��\0#\"v@\r�q��>p\n�4��v:�W�LO�*l^����;\"4z�S�\$0T���\0�z�c\0��Hx&`8��k��TZ\0�9�t���)�\"�@&���*�	�0P\r�9�~DI?h*Z��/ɐ�x�4�\0�\n�.-�6j\0 �J %(�\n\$�'F�2�\0:����	eb\0n����\0ʸ�\n@&\0�c� 0�4�ثȅ\0^����:�����\0�èJW=�ʳ��� �Z(\0004	pR1� '.��!͠)�\0��OH��q@��B��\rF6���\0\n(4��	 �p�8�k���O\rA��35\0��M\0I�/�yHx���y \r��jU��撠�`&,��\rQ�`\0����\0��K�#,�B�G������\$�'����m����+�R�'dΐn�J�)\0�AQ< 1��m���T��@�f�`	�|Fi���Ɇh���>j�;zJ�9�3s���DE&XH?\0��c����(J����*��0�*\n�#\0��������*x,\"�NECyD�	<���.�f��œ��X��\0�?l>��!�ґ#�=:����_'I�d4��@�gߥ���:@9�vh	\0002nw�5@2��J�M��(৑h��ʃ��x�G�\r�����\n��X�\n)4�3��\0����H@-6�u����L�@7\r�Up\n�A��(��xL2�򠤑���'�Nv\0�����&�n�'k\n�k�O[�l�.����\$�3������/c������В>�;嶰��	o��\$���4���T�ڴtTp\$˞��y! 7�P�qeK�3>�8\r�f�(!Z=���\n��\"J��\0�Aq-���B�\"�ŌW@%�~�+(j���9l;��9�8�T�	L{&3J��>��J�`\0���\r�D��PY&.��s:��!����eɠ�{�-,�4��d�\0���B�'������<��� &\0��҉잨�w�9��\0�t�'��.��\0� �߀��\r���fy)E�,X�ҹ�x���(a*����h\rp�3捚	���ߘqu\0��]�����\$w\0r�\n�\0�Q�6g4�f��\r�D*4��w��2����W��\"��1�h�\n��)�.�4�C#��<JQh�ר��٭����	�*���4���\"�� ����!v	��`>n�Ji�'�t�yh��)23�M���H�\$��PI��պ4k� 6���>cb\0�8�9L�VLp`%ڟ�^@��8z�d���I��\0�]�������Cluxˑ\0@-�E��\0��@�@'���'f�VK�7j�bt�П��E\0V\n�6�V*�\0;%�Z'J��*ǿ\0�I���\"�?��O�;�=���≂�����A�^�B�{Sc�����A�����H\n��ń4����G�'\0�I��)�nQ݀�yxK�����\0)ȚJ9e��d�b�\"��j�ɨ��@1���H��\0�fIq+K�C�0`%-2�\r\n���p��,��k�����!����y��D0�VA�nK(G��j�犄M j�+B�C)`'��I�4\0��}����pBjSM\$\0�I��.3&�� '�}Y@�\"�,��.8\0��(hn��z�&�8�gg��܎ܔd���P\n�〲s�k3�2҃;�E#����\0�T�GdE��%�-��*�=A:�\nM��T٢�L���j��9�<�\n�&���(���^��m�,&P���8�]��j�\0b?[�0�>Vp�[�:�����V^c�@�ܥ�44)+�#L]��0���t@�\0�!����VSA4�8�z	����6��v��>���(�x�HD��&�#�D�t��	&��\"x�˪\"�[�e4hmc�Gπp��\0�q�dG�#�T 0}�rRH\n�'&hz�`!����R��CYh�Ts'���`�ds<�ZQ稦�lG	�E%�V\rZ�����@((0@C ̨��)	��4X	�3;����ʏ����{xc���8E�F�߬%\0�v����-���ġ,�܃{� ��LR8&x@(����D�ֻ�s�����fY�@)�d;sgɟ\0�N�J��0#�_�l!1L�ޣ�.��>���`;�b�?a����PN��i�J#��T��\$d=�	D�O��JBZR��U���2�<�ʑ��'������䧉�D����qm\0hX);ɏ&��o#�(a�d�\$r�:���@���T@�ؑ/��g!��c�<*)I/�`0 x��3L~a��ݣ�V�(+�\0���\r'���x�ؘ��H�7����*/�y��\n���9B]-8z;�2\n?3������\$5H|���I�m�ʀD`�,�ʲ�ٻ�0�K��LDD�ʄ0��\0�0�)�i\0�cc{ �#��Ě�	�ɘ���	F�y�,��k߮���� ����G�M�inN؏`{b 	Et�)G,/�~� \0�` �������	J���M\r��Q�pe�<3L��&z��尪�yx؅Z��zQ��m=z�\0)I)�0H�GD��x�\0�4�(㎑�\n*�p7�R�HG����\0fn��#�BQⓒ\0��a�@=��\$W.��\\J�K.+�y��yʿl� ��\r���e9\$�ld�^�� �Z�	��̡��R7Ƃ�J�-\"�Kb�fiI��P�8�0�����歸 1�<��G�:����@��B:ʈ\n|*� #-�I����7���^�%��)M̈́�r|Q��;1��*��Ԁ�+\"�֤����tL~ \n@��0��e���e��ω�C|�� Q�;\0����hK�xB0�J�Ju�l�j�;�yb����K���St���M��s�-7)~�A9d��x�=j�N8�`�U(�\\�.F~�!<K�����E���Y�g�9B~�d���,��S<��M9H �BI�\"���Ry���Q�,ŠX��@< V]��R(�>�~c�*�h�RO\\�.�7�0�|��Ɔ�uk:&����1�nK��-����f��T��� /��~�Ӈ��n��\n�HĪ���5������\0�zC>\$Ξ�ә��1�h��%�C:����ʤ2��\"�S ,fJ���\$+�LR`!\0������(�\n+1v,�o^���J�\"���,�b*�1\nA�j�p*�ȴ�3*x&�B:��Q�fC�\$���C\r��`<D���EX��ƞ.�R�(el;[��F��{��)\$j�3.E��b�J�̀�+��-��LE��C�4#�!F�94|In�J̨B��p\0��I�/\0�y�\$�H؁2!�;��	�9�����2���|	��3��F*���+B2���+I\n²ȬI�.X�x�z���p�\n���\0>�OE�-�ˬ�3������/L�	L���LQmM�^�`� \n��\n�6h��C�\09|��m+�\r�1�h�	�����2%&j�y\n�E�^�����8�3�b-9�q+����L皼�CH��Z\"��9�SӖ �,Dl@���⮰	#�*<�{����;#����,�\r�V�C�\0\$Llh���\n��ls��W:��.��|.H�#4�q^m�\0�@X(�Y���	��(\"��6�PU̮-�@��%�#Q*]7�t�慰�9�bTb�!�.A(w:C�\n�z\0�Cb���: ;:MA�J�.j�)�G4�	��pNy��#ZE1�L�7D������=`\n>�<=���-���H3:�|{��x��B����6m�&Y4��TS�����Xq��?H��٫GT)��(��v����N������#V����'�u��*R\"h\0: ��1���� K�h��k+�ZsD��`�2��b�`\r��1*×g'�l�n�h{�2��7���Y��\r�3�2�dy�����E�ۀq6��h��Rܨ-2\0��Dr�0GĦC��̛Jɦ\$8��!��L�b���Ұ��+���?Z3JB�!=k9�ܟ�C\0&����,2�vMѺ�ڪZo1����\0\n	������\0��0	���aYRK��!�󣬬����H�����Xy��܎0!����;I�� ��(�O(�X�Y���k��P��<��ì���g51u\\�q��kR��<�ט���?X��GE5L���\rU\0��dcU��5�`�\0���Qm_CY�^��!T�V* ����5ZQ�<�^���wN4`�A`\0wW�`�t}b	�� 	�baX���d�\r��Z\"��H��.����\n������e�n�T��⣅,�p'��� ��b`\rj5\0� ��0N���oY�`Bg�Y�Jo>��:�6�4@�5���4mcU��d5�]�K��!Y�b��Hr��uib���*�)A\rl3�Ia)%^��K��f�: ߃�5�S�ȋ��-w%\$��B����HⲌ,:���Y�M���� pŀ�r����� ���. ��;�(�\0�WJ\nxW���Juʄ�	O��(Z�4�\rmj���#��(�\0%�4�h�O\rk]����	@\rȡ ܠ�(������Z09 �<-lCN��/�w�E�hGa��\$(����%`�\0��'�2����P\0��\rP\r�+���%o#�P��𜼓����V%�6���!V��)࣢�Vf�Ac;�&ŁCA��4��)1��1�c���f �X/Y�m6�v�E��&�	`݀���GZ�@R��Ea���oamn�(�m��P)O��|/�X�� E�B�\rB/����b-h,�\$�ՠ:�x	M�b�,\0��Wp	����@l��0�l��\0t��m@��u���X���v0ײ4�+�(���`%fCTXEY؆v.օ^]��P�H�L�K�JMAV��k��Y��	���턖+YJ�]��l/�XmaŔ5�\0�eM�\0>��cCV��J�aU�C0�%pc��W�aH�a\$�3`��vZXue��!q��\0���	�@�vi��Z�b��	�ŗ@");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n8��3)��7���81��x:\nOg#)��r7\n\"��`�|2�gSi�H)N�S��\r��\"0��@�)�`(\$s6O!��V/=��' T4�=��iS��6IO�G#�X�VC��s��Z1.�hp8,�[�H�~Cz���2�l�c3���s���I�b�4\n�F8T��I���U*fz��r0�E����y���f�Y.:��I��(�c��΋!�_l��^�^(��N{S��)r�q�Y��l٦3�3�\n�+G���y���i���xV3w�uh�^r����a۔���c��\r���(.��Ch�<\r)�ѣ�`�7���43'm5���\n�P�:2�P����q ���C�}ī�����38�B�0�hR��r(�0��b\\0�Hr44��B�!�p�\$�rZZ�2܉.Ƀ(\\�5�|\nC(�\"��P���.��N�RT�Γ��>�HN��8HP�\\�7Jp~���2%��OC�1�.��C8·H��*�j����S(�/��6KU����<2�pOI���`���ⳈdO�H��5�-��4��pX25-Ң�ۈ�z7��\"(�P�\\32:]U����߅!]�<�A�ۤ���iڰ�l\r�\0v��#J8��wm��ɤ�<�ɠ��%m;p#�`X�D���iZ��N0����9��占��`��wJ�D��2�9t��*��y��NiIh\\9����:����xﭵyl*�Ȉ��Y�����8�W��?���ޛ3���!\"6�n[��\r�*\$�Ƨ�nzx�9\r�|*3ףp�ﻶ�:(p\\;��mz���9����8N���j2����\r�H�H&��(�z��7i�k� ����c��e���t���2:SH�Ƞ�/)�x�@��t�ri9����8����yҷ���V�+^Wڦ��kZ�Y�l�ʣ���4��Ƌ������\\E�{�7\0�p���D��i�-T����0l�%=���˃9(�5�\n\n�n,4�\0�a}܃.��Rs\02B\\�b1�S�\0003,�XPHJsp�d�K� CA!�2*W����2\$�+�f^\n�1����zE� Iv�\\�2��.*A���E(d���b��܄��9����Dh�&��?�H�s�Q�2�x~nÁJ�T2�&��eR���G�Q��Tw�ݑ��P���\\�)6�����sh\\3�\0R	�'\r+*;R�H�.�!�[�'~�%t< �p�K#�!�l���Le����,���&�\$	��`��CX��ӆ0֭����:M�h	�ڜG��!&3�D�<!�23��?h�J�e ��h�\r�m���Ni�������N�Hl7��v��WI�.��-�5֧ey�\rEJ\ni*�\$@�RU0,\$U�E����ªu)@(t�SJk�p!�~���d`�>��\n�;#\rp9�jɹ�]&Nc(r���TQU��S��\08n`��y�b���L�O5��,��>���x���f䴒���+��\"�I�{kM�[\r%�[	�e�a�1! ���Ԯ�F@�b)R��72��0�\nW���L�ܜҮtd�+���0wgl�0n@��ɢ�i�M��\nA�M5n�\$E�ױN��l�����%�1 A������k�r�iFB���ol,muNx-�_�֤C( ��f�l\r1p[9x(i�BҖ��zQl��8C�	��XU Tb��I�`�p+V\0��;�Cb��X�+ϒ�s��]H��[�k�x�G*�]�awn�!�6�����mS�I��K�~/�ӥ7��eeN��S�/;d�A�>}l~��� �%^�f�آpڜDE��a��t\nx=�kЎ�*d���T����j2��j��\n��� ,�e=��M84���a�j@�T�s���nf��\n�6�\rd��0���Y�'%ԓ��~	�Ҩ�<���AH�G��8���΃\$z��{���u2*��a��>�(w�K.bP�{��o��´�z�#�2�8=�8>���A,�e���+�C�x�*���-b=m���,�a��lzk���\$W�,�m�Ji�ʧ���+���0�[��.R�sK���X��ZL��2�`�(�C�vZ������\$�׹,�D?H��NxX��)��M��\$�,��*\nѣ\$<q�şh!��S����xsA!�:�K��}�������R��A2k�X�p\n<�����l���3�����VV�}�g&Yݍ!�+�;<�Y��YE3r�َ��C�o5����ճ�kk�����ۣ��t��U���)�[����}��u��l�:D��+Ϗ _o��h140���0��b�K�㬒�����lG��#��������|Ud�IK���7�^��@��O\0H��Hi�6\r����\\cg\0���2�B�*e��\n��	�zr�!�nWz&� {H��'\$X �w@�8�DGr*���H�'p#�Į���\nd���,���,�;g~�\0�#����E��\r�I`��'��%E�.�]`�Л��%&��m��\r��%4S�v�#\n��fH\$%�-�#���qB�����Q-�c2���&���]�� �qh\r�l]�s���h�7�n#����-�jE�Fr�l&d����z�F6����\"���|���s@����z)0rpڏ\0�X\0���|DL<!��o�*�D�{.B<E���0nB(� �|\r\n�^���� h�!���r\$��(^�~����/p�q��B��O����,\\��#RR��%���d�Hj�`����̭ V� bS�d�i�E���oh�r<i/k\$-�\$o��+�ŋ��l��O�&evƒ�i�jMPA'u'���( M(h/+��WD�So�.n�.�n���(�(\"���h�&p��/�/1D̊�j娸E��&⦀�,'l\$/.,�d���W�bbO3�B�sH�:J`!�.���������,F��7(��Կ��1�l�s �Ҏ���Ţq�X\r����~R鰱`�Ҟ�Y*�:R��rJ��%L�+n�\"��\r��͇H!qb�2�Li�%����Wj#9��ObE.I:�6�7\0�6+�%�.����a7E8VS�?(DG�ӳB�%;���/<�����\r ��>�M��@���H�Ds��Z[tH�Enx(���R�x��@��GkjW�>���#T/8�c8�Q0��_�IIGII�!���YEd�E�^�td�th�`DV!C�8��\r���b�3�!3�@�33N}�ZB�3	�3�30��M(�>��}�\\�t�f�f���I\r���337 X�\"td�,\nbtNO`P�;�ܕҭ���\$\n����Zѭ5U5WU�^ho���t�PM/5K4Ej�KQ&53GX�Xx)�<5D��\r�V�\n�r�5b܀\\J\">��1S\r[-��Du�\r���)00�Y��ˢ�k{\n��#��\r�^��|�uܻU�_n�U4�U�~Yt�\rI��@䏳�R �3:�uePMS�0T�wW�X���D��KOU����;U�\n�OY��Y�Q,M[\0�_�D���W��J*�\rg(]�\r\"ZC��6u�+�Y��Y6ô�0�q�(��8}��3AX3T�h9j�j�f�Mt�PJbqMP5>������Y�k%&\\�1d��E4� �Yn���\$<�U]Ӊ1�mbֶ�^�����\"NV��p��p��eM���W�ܢ�\\�)\n �\nf7\n�2��r8��=Ek7tV����7P��L��a6��v@'�6i��j&>��;��`��a	\0pڨ(�J��)�\\��n��Ĭm\0��2��eqJ��P��t��fj��\"[\0����X,<\\������+md��~�����s%o��mn�),ׄ�ԇ�\r4��8\r����mE�H]�����HW�M0D�߀��~�ˁ�K��E}����|f�^���\r>�-z]2s�xD�d[s�t�S��\0Qf-K`���t���wT�9��Z��	�\nB�9 Nb��<�B�I5o�oJ�p��JNd��\r�hލ��2�\"�x�HC�ݍ�:���9Yn16��zr+z���\\�����m ��T ���@Y2lQ<2O+�%��.Ӄh�0A���Z��2R��1��/�hH\r�X��aNB&� �M@�[x��ʮ���8&L�V͜v�*�j�ۚGH��\\ٮ	���&s�\0Q��\\\"�b��	��\rBs��w��	���BN`�7�Co(���\nè���1�9�*E� �S��U�0U� t�'|�m���?h[�\$.#�5	 �	p��yB�@R�]���@|��{���P\0x�/� w�%�EsBd���CU�~O׷�P�@X�]����Z3��1��{�eLY���ڐ�\\�(*R`�	�\n������QCF�*�����霬�p�X|`N���\$�[���@�U������Z�`Zd\"\\\"����)��I�:�t��oD�\0[�����-���g���*`hu%�,����I�7ī�H�m�6�}��N�ͳ\$�M�UYf&1����e]pz���I��m�G/� �w �!�\\#5�4I�d�E�hq���Ѭk�x|�k�qD�b�z?���>���:��[�L�ƬZ�X��:�������j�w5	�Y��0 ���\$\0C��dSg����{�@�\n`�	���C ���M�����# t}x�N����{�۰)��C��FKZ�j��\0PFY�B�pFk��0<�>�D<JE��g\r�.�2��8�U@*�5fk��JD���4��TDU76�/��@��K+���J�����@�=��WIOD�85M��N�\$R�\0�5�\r��_���E���I�ϳN�l���y\\����qU��Q���\n@���ۺ�p���P۱�7ԽN\r�R{*�qm�\$\0R��ԓ���q�È+U@�B��Of*�Cˬ�MC��`_ ���˵N��T�5٦C׻� ��\\W�e&_X�_؍h���B�3���%�FW���|�Gޛ'�[�ł����V��#^\r��GR����P��Fg�����Yi ���z\n��+�^/�������\\�6��b�dmh��@q���Ah�),J��W��cm�em]�ӏe�kZb0�����Y�]ym��f�e�B;���O��w�apDW�����{�\0��-2/bN�sֽ޾Ra�Ϯh&qt\n\"�i�Rm�hz�e����FS7��PP�䖤��:B����sm��Y d���7}3?*�t����lT�}�~�����=c������	��3�;T�L�5*	�~#�A����s�x-7��f5`�#\"N�b��G����@�e�[�����s����-��M6��qq� h�e5�\0Ң���*�b�IS���Fή9}�p�-��`{��ɖkP�0T<��Z9�0<՚\r��;!��g�\r\nK�\n��\0��*�\nb7(�_�@,�e2\r�]�K�+\0��p C\\Ѣ,0�^�MЧ����@�;X\r��?\$\r�j�+�/��B��P�����J{\"a�6�䉜�|�\n\0��\\5���	156�� .�[�Uد\0d��8Y�:!���=��X.�uC����!S���o�p�B���7��ů�Rh�\\h�E=�y:< :u��2�80�si��TsB�@\$ ��@�u	�Q���.��T0M\\/�d+ƃ\n��=��d���A���)\r@@�h3���8.eZa|.�7�Yk�c���'D#��Y�@X�q�=M��44�B AM��dU\"�Hw4�(>��8���C�?e_`��X:�A9ø���p�G��Gy6��F�Xr��l�1��ػ�B�Å9Rz��hB�{����\0��^��-�0�%D�5F\"\"�����i�`��nAf� \"tDZ\"_�V\$��!/�D�ᚆ������٦�̀F,25�j�T��y\0�N�x\r�Yl��#��Eq\n��B2�\n��6���4���!/�\n��Q��*�;)bR�Z0\0�CDo�˞�48������e�\n�S%\\�PIk��(0��u/��G������\\�}�4Fp��G�_�G?)g�ot��[v��\0��?b�;��`(�ی�NS)\n�x=��+@��7��j�0��,�1Åz����>0��Gc��L�VX�����%����Q+���o�F���ܶ�>Q-�c���l����w��z5G��@(h�c�H��r?��Nb�@�������lx3�U`�rw���U���t�8�=�l#���l�䨉8�E\"����O6\n��1e�`\\hKf�V/зPaYK�O�� ��x�	�Oj���Ĩ�p�M��L��\r%��\"B	�H1\$o	��hI&�\r�!)��!� 2\0�Fˠ�����,|G���E1O��LM|��&�D<`2Z	��\$��1�I�'Rd!�����H��.OrN�,���X&\n�����b<\$ɬ�6��z���1���%H�C`x��\r��E�(\"<�@n�����<ɨr����O�\r�8\r��]�s�'=��S�+��>�,�<{��`M\nk-��KrNa���E%�Gy4&'(G\$���	-9���喬���d��g�>*�����K�2�yHv�*YQ ��0*�@6P��*���o�@�P/�h�O��D��\")��m��Tϒ�	�cNd��e^��Q�\0�ei�8��x\"����̓t����2�#��d��\$���4�L�\r�A\"\\\\c���\n�d��`����&�b!�Z2g՞�	�8���4\\?� j6#\0���(Ty����\0�mi+»��<�����#}�a��PM�%a�D��Z��&�4��H�> ���%0*�Zc(@�]��Q:*���('\"x�'J_ӟ1��`>7	#�\"O4PX���|B4��[�����\$n�1`��GSA���AH��\$��`<<jcUl�@�<�87E�C��j�Ey:�@�u�r����<��~~|���ǣHsE��a��>e����x �Qf�'�rw&����X����ݕ��ui�jD�'��A�H(���}?��gh���0QN��3o4ԧT��7!}�3�\\�ܶN盄uT�7��T��+�kk<��\0��������d��I9!�����������>���‎��\r�MXwD���*�z�R�y�Q!��@�`�Ǯq��r��@<��;\0000��\"!�x��h� (\nT��W�I�r&Dv\r��5�#\$�3(\0P@");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Gc=file_open_lock(get_temp_dir()."/adminer.version");if($Gc)file_write_unlock($Gc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$m,$Mb,$Rb,$Zb,$n,$Ic,$Mc,$aa,$kd,$x,$ba,$zd,$le,$Le,$Vf,$Qc,$ug,$yg,$U,$Lg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Ee=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Ee[]=true;call_user_func_array('session_set_cookie_params',$Ee);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$tc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$zd=array('en'=>'English','ar'=>'العربية','bg'=>'Български','bn'=>'বাংলা','bs'=>'Bosanski','ca'=>'Català','cs'=>'Čeština','da'=>'Dansk','de'=>'Deutsch','el'=>'Ελληνικά','es'=>'Español','et'=>'Eesti','fa'=>'فارسی','fi'=>'Suomi','fr'=>'Français','gl'=>'Galego','he'=>'עברית','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'日本語','ka'=>'ქართული','ko'=>'한국어','lv'=>'Latviešu','lt'=>'Lietuvių','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'Português','pt-br'=>'Português (Brazil)','ro'=>'Limba Română','ru'=>'Русский','sk'=>'Slovenčina','sl'=>'Slovenski','sr'=>'Српски','sv'=>'Svenska','ta'=>'த‌மிழ்','th'=>'ภาษาไทย','tr'=>'Türkçe','uk'=>'Українська','vi'=>'Tiếng Việt','zh'=>'简体中文','zh-tw'=>'繁體中文',);function
get_lang(){global$ba;return$ba;}function
lang($u,$ge=null){if(is_string($u)){$Oe=array_search($u,get_translations("en"));if($Oe!==false)$u=$Oe;}global$ba,$yg;$xg=($yg[$u]?$yg[$u]:$u);if(is_array($xg)){$Oe=($ge==1?0:($ba=='cs'||$ba=='sk'?($ge&&$ge<5?1:2):($ba=='fr'?(!$ge?0:1):($ba=='pl'?($ge%10>1&&$ge%10<5&&$ge/10%10!=1?1:2):($ba=='sl'?($ge%100==1?0:($ge%100==2?1:($ge%100==3||$ge%100==4?2:3))):($ba=='lt'?($ge%10==1&&$ge%100!=11?0:($ge%10>1&&$ge/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($ge%10==1&&$ge%100!=11?0:($ge%10>1&&$ge%10<5&&$ge/10%10!=1?1:2)):1)))))));$xg=$xg[$Oe];}$xa=func_get_args();array_shift($xa);$Ec=str_replace("%d","%s",$xg);if($Ec!=$xg)$xa[0]=format_number($ge);return
vsprintf($Ec,$xa);}function
switch_lang(){global$ba,$zd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$zd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($zd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($zd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$ra=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Od,PREG_SET_ORDER);foreach($Od
as$A)$ra[$A[1]]=(isset($A[3])?$A[3]:1);arsort($ra);foreach($ra
as$y=>$Ye){if(isset($zd[$y])){$ba=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($ra[$y])&&isset($zd[$y])){$ba=$y;break;}}}$yg=$_SESSION["translations"];if($_SESSION["translations_version"]!=1114216008){$yg=array();$_SESSION["translations_version"]=1114216008;}function
get_translations($yd){switch($yd){case"en":$g="A9D�y�@s:�G�(�ff�����	��:�S���a2\"1�..L'�I��m�#�s,�K��OP#I�@%9��i4�o2ύ���,9�%�P�b2��a��r\n2�NC�(�r4��1C`(�:Eb�9A�i:�&㙔�y��F��Y��\r�\n� 8Z�S=\$A����`�=�܌���0�\n��dF�	��n:Zΰ)��Q���mw����O��mfpQ�΂��q��a�į�#q��w7S�X3������o�\n>Z�M�zi��s;�̒��_�:���#|@�46��:�\r-z|�(j*���0�:-h��/̸�8)+r^1/Л�η,�ZӈKX�9,�p�:>#���(�6�qB�7��4���2�Lt�.���\nH�h\n|Z29Cz�7I����H\nj=)��(�/\n��C�:��\$��0ʖ��Zs�j��8�4N`�;�P�9Ikl �m�_<\"�H\"���L�����2����q�a	�r�4�Ԉ1OAH<�M	�U\$���V���%�\$	К&�B��c͜<�������KF����⧭~�,�r(� J\0Ap���9���P&'�h6B;��0���\"�ƎR�΂�\"�ލJ�p򍯃��1�#��:���݅��P��[������3��\r�O�b��8�+����!�������:��0�)`�>�x�)h�l8\r1�2��/a�c�BT�¯v�'�zjj�F4 #0z\r��9�Ax^;�rA�/�r�3���]wh^(�\"���}o���7�,Į5��l�,Xƒ��OS�ƿ*l9q4O�*@	��6+���̳Ɖ�33����h�v-)dk���#��},�Cc��P%���;�⣏Z�����(Ap�B��H\nE��P!���V���\"4�h�*��Pl�R�a1&m}ӨxO�s=�A��Bx��<2	8�\0Sۍ--�W���	�4h���BR������Md\$�Ѫ��J�i/7�m\n��a�%8ᐟ� MZ��>ǌ�����L0I\"�rByՔ1?怀�fTI\"�27GtՈc#ǎ-���eIC'U���!�lH���=K��wQ4��xd��pn\$�89Ɣ]��1���h@vH�\$�9�p@L\$�(ɒ0��7E�ϗ�Րr`�\$��`b��<��IjXUl��Ď-�}-�4����ݗ�:�Ba��];p̧&z��2�]�����h@6��Z�;\$��7��\\�i�,� �pK��dT*`Z�.�4�*���T�%����Sa&꼘l~V=�LD��/�b�Jg��H�9�Xp�T|\r�9�^B��6�h�Η%HX\\m���6K9F<	D�R��tiYQA\\4�p@HB�Lt<;���%�&�(!��~����/TT৐�V�#dx��sEJh�S������8��O	sh��2�e��c����";break;case"ar":$g="�C�P���l*�\r�,&\n�A���(J.��0Se\\�\r��b�@�0�,\nQ,l)���µ���A��j_1�C�M��e��S�\ng@�Og���X�DM�)��0��cA��n8�e*y#au4�� �Ir*;rS�U�dJ	}���*z�U�@��X;ai1l(n������[�y�d�u'c(��oF����e3�Nb���p2N�S��ӳ:LZ�z�P�\\b�u�.�[�Q`u	!��Jy��&2��(gT��SњM�x�5g5�K�K�¦����0ʀ(�7\rm8�7(�9\r�f\"7N�9�� ��4�x荶��x�;�#\"�������2ɰW\"J\nB��'hk�ūb�Di�\\@���p���yf���9����V�?�TXW���F��{�3)\"�W9�|��eRhU��Ҫ�1��P�>���\"o|�7���LQi\\� H\"����#��1��ŋ�#��܇Jr� �>�J���sޜ:��?P]<�T(\"'?�n�pSJ�SZ�ɻ��\"�\"T(��<�@SN��^v8b�W��V�#���3�h�D��>T&������L��e��S�x���|��'ȍ�@I����w��[I�l~�!T�l�tK�=덮���)u�ۄ�83�Q_@�	�ht)�`P�5�h��cT0���C���OhH\"7�^��pL\n7gM*�g��<7cp�4��Rg�:�`B�C��6L�@0�M(�3�c�2�Q[!*j�=A@��bO!X]\"�S�MD����vƯ�aZ���J\0�ϩ��;b�C!iM�x���Cwm[��Uԩ���c�SD�u��N�����0z\r��8a�^���\\0��n�A#8^2����izh^)��6�\rx����^0���A鷣}t��c�ҍ0�6�#w���i�A��K�T���]¨8J���CJCti�;����3 ����fs�`1�3d�0u��7�s� )�6������z��0���Q�9/Ÿ��U���\r?�ݳ�R��!�L��2*T5H0���`��_T=A���Tk\rq���\r5cfoЪ��p;ŷ���� ��9��-�!�|��8T8� 7��4=��݌7��1��\ny'!��0��4IP�Z*6��jCF<��Ԓ��ilD�!����DKO'�\r�f�Vœ�:�N�2P�)G>G,A9��\n�3Td��8�xL�I&|@Ү�:B���f�C�u6H\\3 ���w���B�8�!`C�ŧ��ڠ%�\n<)�BDY��/���z�U�{����BlN�\$�ĺ#C�s���Ȫ�ț?�LG{D�h��*[S�\n (ٙ!P!����:���\0S\n!0h�\rk��P(R٩���Sro�iSr�Ĉ��3�B��0�0�f�S��\$�jEp�5�M��OP�I�\"�)V�Q�M����	Q\na�9�V�c\rm:��f�U{ox4�`�PɘF��C�x\0U\n���~�!�d��8)�E��=�ސ�|a��-���ڢ�`(\n	��0�kEs.I�-t�ݔy ^�ܹU�x-�\0\":�QP�\"�-���0C��zu�93	�����Ph\n�n�)�B�JTB[���8���_e\"ոiƸ9;ipS��\0Ŵ�gEu�V�0�\\�W�������F`\n�&��	D�h�(";break;case"bg":$g="�P�\r�E�@4�!Awh�Z(&��~\n��fa��N�`���D��4���\"�]4\r;Ae2��a�������.a���rp��@ד�|.W.X4��FP�����\$�hR�s���}@�Зp�Д�B�4�sE�΢7f�&E�,��i�X\nFC1��l7c��MEo)_G����_<�Gӭ}���,k놊qPX�}F�+9���7i��Z贚i�Q��_a���Z��*�n^���S��9���Y�V��~�]�X\\R�6���}�j�}	�l�4�v��=��3	�\0�@D|�¤���[�����^]#�s.�3d\0*��X�7��p@2�C��9(� �:#�9��\0�7���A����8\\z8Fc�������m X���4�;��r�'HS���2�6A>�¦�6��5	�ܸ�kJ��&�j�\"K������9�{.��-�^�:�*U?�+*>S�3z>J&SK�&���hR����&�:��ɒ>I�J���L�H�,���/�\r/��SYF.�Rc[?IL��6M�)���V�5԰КRf��e�rh���i�ʍW4��&�+Œد�\\�A#\"�-(���U⭣��?	���Zw�j��K�\0�+@�\"M*�EV�\nC����bM��r����+�)��YNJb�BX����6#��'�,}���́C2������R*ZWE*���˲��x�ם���N}��[4����{^a\n�hR8th(��΀� P���ۈ�������v���ʚ��V��D\"\r#�b6F�pA��w��\\g2���7cH��.(��?�P�:TF�O2�7��W;�;k�=��˓���6���)R��L���\$pRM�֨k���ή��v�<��y���?}E��L��jޣh�Jfw��\n�����7�3�T5w:�o�mz~]�Q��`����{ŉ-v,\\PѫB�`�4r�A�1'3t��!���*j��`��^I�=�x��_@�x���<a	�\$�N<�D��ayAj�ٓ�\\�a�9P�Ah��80t�xw�@�0�@�Cr(Ȭ3��/���s.l�\"���\$G�,�^A��GF�V?��W�>��6D�չ{X���咶�97���������/>� ᚣ�Cc��:eN6r�Q�hF��1�G4���/\r��1#P��2+\r��w�僒>a��0�eXl\r�,	R@ ���K0@�(dr�0���sV�eY(���W!K���+uh-��;�̝\0�	����ޟ�@\np)/0䬚�t�\0PCsqfRŀ�2�x �4�f^C<��I	8Tv��՘A�ZJ	EA�A�\"K�B��]'�!�T��pw\r�1̘��T�F��1���XVJ\r3��O�r�R�\$��Ѣ#��?oO,��D�P\$k�U,=wV�M�{�eA���\n)�AE)�&sH�֢Vh�N:�Ĳ�j����\$��		�{N3�9�t�Gā�xriԴ��Ӊy�<)��)U�oJ�x*@� �h����5\nx�U��e䙀:u����}W��kViݾxB�]�XF�������^iG۩\n����F��Vupc����Fʗd#��,!�'��rU-�p'H��%*Mga\rxU���\0�Bag.���an0T�L��^RҔ�b�vr&�읉P.(V\0��{\rSȹ(=f(���v�W����jf6�(񵅲�\r�&0���ψXL��3q,�\$V�,j/yF�\\E#�,��ݰ� .\n Ct���ӦLW�\\��\"� �M�kQ���T��bl�f�fIS}&�tT*`Z*l�L�)��F�q����iC\0001Ckj����\rhX�f�[0�S���׏7\nus�\r��H�Ң�q�M,޸������[M`���|L!��<����V	�����CS.�R��Z���,���+�xҸ\0�n>a@��7�g��~hpL�S�U�vD�*!�mA�PT6l%��/S	X*u�4�<���p:��qzG��_95�{N*R �fn�>�%�4+�l'���M��Q<����iħ��#�iZT�IRM��kN�p";break;case"bn":$g="�S!�\n��\0�@�xJ��_��:6\0�����P�\\33`��\0��!�(l	MS,����S,\$���]�)��d5s�@qD<6(R�\$�i�撦VI�\nxʙ+\rB�b���\0���!�e4�M*��+V�p@%9���;e��2S'�	��`�Ob��M^�bS�%UP�H��)�x2�S�)��zʞ������4��\0���h3��Q����L<��We�+l�����qr���'��PP~9��.-Z!N���E�y�@h0���q�@p9NƓa��e9�����0��X�4\r/��0�O���Λ��(%�\0Q���N�!Ί6��	Т�'P�\n����5*\n`�9�z�;�{���b껥D5đ�;h&��\r��(%\"(@;�s�ݮ�<GC��#pΩ�0ȭjbV������Ҩ1䖣���*��[�;��\0�9Cx佈�0�oX�7�`�:\$O��AR�9������zSE-���<�7�3�S\"l:������N�s	+Ĳˎ�\$�\nV����r���\r9m�f��Sz�9V��;i0hj��q�ֹq���N��-EDYY�s��)�\n ����SwE�咪��n�i�!p6Tи�k��z���l��5���|��1*�6%oU��sc�HȦ �e\n����|�e*����nQ�^dMO�h�M	f�P��к:2V���\$T�U5AL����<�\0S���\\��b�0��8��jl��H����G�d~�:�kwd*��m�ua:&u�2Z�G�\0E����L�V���#tC�Y�xO�Q�oS���M���爭��i(j���ɈP�t�^��M�j5�bX�ޑ�.�}T��������n�3�͢So����T[�@t&��Ц)�C�\\6�����B���3���pZ�O�)�,������s�=j�����na�7��8�Kr6TI�6@��!�!������b]�p�����ճ'v\0�1s��l0��D��	\0��}�3�p��.\n�x�B��!�Mbwt�ªX����\"r̡[�m/Ձ�c(TBG�K���� 8p\r0qM�\0xO<�����s@��x��d\r��A� ��(n�\"D���x�\$6��dHt��0���\$�\r���\0��XiR��6��&a\"����&��J��oK�\n�A}Y�LN(��@�z�c�1>�s�\0b=a�?�e& aщH�0�~�f�@6�ΗA�@g�c� �&\0c��d4����m�N��o�at＿7��@P���S6�tZ�*B�ʥb�f\nôt�����dJM8�P!��_2��g?G��#�}�+DRa�:�\n������ޘ�����I���KM�A:�\r��:�Xʦ�Ja�P�������0�U�\n�� ��\0�F!���92�TS,�xJ���Ȭ��y\0yu�^\nj�gP��7�:��t�	6�1]P�V��_A�mg�J��(����B�~x�A�f�e�d�hP�!R~�qLfJ\n�!\n�.���HC���4�CڤHn������O�6�\0� �\$�3�r���MԱ�S�q�|�E0�@'�0�Condu���6�l�;+�ȍY�wh[c�������t�X�CJʭ��s3�(�����WUD��ź�����Y#�b���)��5/�8`�B�sD\r2UJT{�s	=J\rʡ�D��RM,q��dʱ���ϰ�T屻>�,�@��\"qv\0Fp���\0R��}g8ٞ���)�\n*�AZ_����[]������L��i�͟d���1�v��ܷ�2�Rm��V�c\r`��G=�E+��4�`��F�A��)	�Q��U\n���\0��^/yʺgHJ�����dQ�ѧ���	�����eU����@������Ȇ�9Z��7mr�\n���[6�u��J����m��2�Al�^~�f��n����ү��iKp�a�]\$�v(Ә��bY@��ƿ�fsy2�P�;l`��+=s���k�Xs�g{`��ϕ�F���/ ��mPJ)C\0�? iK�Yp���c�M�|;Zm�C\\r\n�&-�l��6>��D0�}fU1݉�O2���ZvϮNa��\r��ʪ�vw0Kn��b��ebm�߬fd��(";break;case"bs":$g="D0�\r����e��L�S���?	E�34S6MƨA��t7��p�tp@u9���x�N0���V\"d7����dp���؈�L�A�H�a)̅.�RL��	�p7���L�X\nFC1��l7AG���n7���(U�l�����b��eēѴ�>4����)�y��FY��\n,�΢A�f �-�����e3�Nw�|��H�\r�]�ŧ��43�X�ݣw��A!�D��6e�o7�Y>9���q�\$���iM�pV�tb�q\$�٤�\n%���LIT�k���)�乪��0�h���4	\n\n:�\n��:4P �;�c\"\\&��H�\ro�4����x��@��,�\nl�E��j�+)��\n���C�r�5����ү/�~����;.�����j�&�f)|0�B8�7����,	�+-+;�2t��p�ɘ��H�ǋ����'��ʊ�B���B��5(���L{,��S�K�I����\"5/ԥ!IQR�<*�PH�� gR�)t�ƭ�<�14�h�2#����&2�ڇr��5�l<��/��\"��th���P�2%�\"X;O��X=1\"������#�ìX��JŘ����2���h9\\HE�e�1�ͫ�?4��\r�dޑ\nM|�ih9�6��\$Bh�\nb�2B�h�c�4<���b������B#h���kV����n�)�(�?��7cHߜ%�c��\r��0�'��2�7/�f9Yե1IH����5�%°�n �U�!�֌���!,h�'p�R��#�'\n检����\0x�����C@�:�t��a,2�9˘����l�g9�^)��6�\r;7��^0�٤�4D�`@6�)�%C�h�u��}ģhޅ������5�x�Ü���Є#靄�L6Rʻ�3.ldN0��>g{�cT9�ï���/�\r廬�,`@1�s�]Ù./E��j�9�D���<��C��P	@��d�	* �0����ʳ�(���3Ji�J�.a�՛D��,�Q���j�	)z����(x��BHP9\"p�l��0���=��B�(M\$�15�|w� C\naH#!�L����!��6�k_���ɻC�s�#�v������4L�����V	�`���zw��0�'�����9pB7\"se��q��c���drM���Kt�5a�0��ؘ�Y� �@'�0�Ƞ��C���\n���!y\\�4h����!	21�\r�pf!D1곢�Q��S>�}436�O�%�%��b�Q	��i2�J@B0T��i�����94�r�H	&\r!��r?��,�F��E�4\$��7��*r�\nz�X�7�4`�uv�ݢ�����Q��Ej:��0CK���s܊�;�9<�u�tkA���J��8��*�@�A�-h���*�#��L��v�x��93�t��ZB*�W.�0�7�f��d�\r�bVO)�'�@7��<��5:>g�CLI�NGҜ���@l9>3j*e��)O\n�(h�D!�Զ��/��*ٴT�h��Kf�p�ْ�����ds|6��)��_�%�TxߘBv�U�Z��+<x,����e�(�F@PR��\0";break;case"ca":$g="E9�j���e3�NC�P�\\33A�D�i��s9�LF�(��d5M�C	�@e6Ɠ���r����d�`g�I�hp��L�9��Q*�K��5L� ��S,�W-��\r��<�e4�&\"�P�b2��a��r\n1e��y��g4��&�Q:�h4�\rC�� �M���Xa����+�����\\>R��LK&��v������3��é�pt��0Y\$l�1\"P� ���d��\$�Ě`o9>U��^y�==��\n)�n�+Oo���M|���*��u���Nr9]x��{d���3j�P(��c��2&\"�:���:��\0��\r�rh�(��8����p�\r#{\$�j����#Ri�*��h����B��8B�D�J4��h��n{��K� !/28,\$�� #��@�:.̀��(�p�4�h*�; p��B+���0�9�˰!�S��,��7\r3:hŠ�2a�o4эZ�0����˴�@ʡ9�(�C�p��E1���^uxc=��(�20؃��zR6\r�x�	���	�Z�R��3єr9g�+�����ͧ0e�	a� P����qq\$	�I�(��2�N�;W�R�v��m��oP�py0o��4^����_q%�9[�����@�	�ht)�`P�2�h��cL0����u�Pu&�����E�ꓯY���\$��K�7bb&C���6L\0SFҤ���3��+��t99��7R��!��z�*�R8[)�hi��R�L��H��C#�떺6��9��4�&\"k��\$�Z1Xۆ�2�\0x�\r���C@�:�t��<#�*�.�8^�t�3����xD��Ȥ-M���^0�٪��\r��욌#Z:�RC�}J�q��W(��!,\n��eB\n6N��hQ�Ў�7���zR1#��̺�T��3p�5�E�PA`����1�J�L�Y4+��a���m�\\��a��#+�j�P��A�7�\0PTAJ\0F�YB�p����\r��ٚ�Zk�C�5e�:&�\n���\r�����̡� ���7�}��GH)8�>�\0c\rԻ�e@n_�B�����}�S\nA�.��M�p \n�ܚ#5���9V}�)#��H¾x�����N�<\r�hTZc2�p�\"�bH�y4��OÂ��Q�T~dA���ē��	�7H�Նb�͑8��@'�0�A�a�'�`�v�d�HRq���A)dl��y�NБ�r���vD&m��փn*&�I�S�mV	#ʀ��\0�BaH#��x\0� ʔS��\r�d\n��F�����{\njFGc4�C��C����?���%䒆z���'.�4��\n�c���	�)BkG(��*\n~��4���\"\r0�W*,�SI`�R�iB�\$��`��	�@��2�\0�0-�|��WA�����R��j�\r����zU�AW�C��i�3B��a%~��Ę�i@yc�h�&U/0�[,I�0Ǟ�8���\r�\0000�1N��\$�x���R�Ld������P\"	�Yz��bֱ8a��.�X�ARa���6����e\"���&�54��b{X+X\"��6���	LJԢ��p�͕uG�P0�@Q�\n";break;case"cs":$g="O8�'c!�~\n��fa�N2�\r�C2i6�Q��h90�'Hi��b7����i��i6ȍ���A;͆Y��@v2�\r&�y�Hs�JGQ�8%9��e:L�:e2���Zt�@\nFC1��l7AP��4T�ت�;j\nb�dWeH��a1M��̬���N���e���^/J��-{�J�p�lP���D��le2b��c��u:F���\r��bʻ�P��77��LDn�[?j1F��7�����I61T7r���{�F�E3i����Ǔ^0�b�b���p@c4{�2�&�\0���r\"��JZ�\r(挥b�䢦�k�:�CP�)�z�=\n �1�c(�*\n��99*�^����:4���2��Y����a����8 Q�F&�X�?�|\$߸�\n!\r)���<i��R�B8�7��x�4ƈ��65��n�\r#D��8�je�)�Kb9F��n��BD��B��5\$C�z9Ƃ���;���A����.�sV�M��#�� @10�N��}Q��,��C�7�P�pHV���55@�2DI��;<c*,0��P��2\"��À���kʌB}�9��\$q@��@��1t3n��ͳm��P�<��'?�CtIO���M�67��z�5%�k����^p]�`��0��p��GϢ@t&��Ц)�C \\6���哎B�i���-4�ă���8	�ٚ+0��=)���D�+�0��w<	J3<3����^�uЅ\r\rr��j��m^4#H��:�k��3���&��\0�����4�5p�R\r��`�75�4�Ӳ�;Fղ�	ޚ�;�њ6;�^;oW�ÿG���p��\r�8��M4�V�;�)������%v��P҉�7�M\$ԍ�.�l���C\r����T�ɸ��l�Σi�n����A��^�A#D���L����s���@2���D4����x����F���Q)�1�0^�I��\r��\0|Cjc�t7\"�.xaͅ�2�T��`)�֑�4Q��ex�)�%�H�0mm	�11zI	�:R�����f�ê���`〜�s��\$�]K�w����M�}u	���ڄCLHNa�������xz;IXL���A\0d(��8&c��r8��h�~\0P	@F��+WT@���D�R�1Q��F(g���'���\\В��䝪����BA����9\ra�q��4�<�E\"rO�q.�f��ކ��5��@R��-��(I�4Ħ:�2��+_� �1�)/3��7�E(/N߇�������4woa	4P��T�jn��ʑ#�\"*�I#(�C#�j�����FkܩF\$2M��\"�P��\\xB�O\naR8����4\"����y��!o\r����C8u8b6*�䈃��`�̕�b���@S\n!0��r�+|�f�x�)�Czn&�*HC~L)�F�!���ՊZ\r'GD_)�>�\r�s<��z��Z�}nU���^Jz�Dz�)��T+zd'���Wi�j����j�\n����`6Aa�3J�T����̑��ul�/b����J�tA���g���S\$��F�_��y?͚��iLR&�Ȣ=�?\r�#�Gb�9e�¨T��M��+��vRִ�f��WZI��yZM�ׄ9V&y,��b���D�i�C�ZG٘&���8n2* ��SHc�]A��c\"��ƅ搿#�+LUz>BhU�56�0������&�N��&ԭ#��\\H�a�\nv�z���QI�v�(!��u��5��)熰Z�2˝�����Z�	�o�\0�˗Z�Ⰰ�!�B�yW����ǃ�h��?\0(*��(�3\n�{᫐k��";break;case"da":$g="E9�Q��k5�NC�P�\\33AAD����eA�\"���o0�#cI�\\\n&�Mpci�� :IM���Js:0�#���s�B�S�\nNF��M�,��8�P�FY8�0��cA��n8����h(�r4��&�	�I7�S	�|l�I�FS%�o7l51�r������(�6�n7���13�/�)��@a:0��\n��]���t��e�����8��g:`�	���h���B\r�g�Л����)�0�3��h\n!��pQT�k7���WX�'\"h.��e9�<:�t�=�3��ȓ�.�@;)CbҜ)�X��bD��MB���*ZH��	8�:'����;M��<����9��\r�#j������EBp�:Ѡ�欑�������#�j���\"<<�cr�߯K���;�~��r&7�O�&8�@(!L�.7422�	��B�\"�l�1M�(�s��\rC��@PH� h��)�N��;,���'�p���H�4��C\$2@���\r����)(#S�N'�P��\r ��Q��U,����t�\$�\nn��6�:�B@�	�ht)�`P���نR�v�J.�U#j2=Lr���\n��7B0�8�\r�2�	�܃\r��OL�P�B�ނ-(�3�\n�E�P\$U06��c/��\\��,e�)��Φ 8�؝.�Zb���D���	:S~��\\�2�Ѿ@�T\$n��\r	���CC.8a�^���\\��h�γ��z��^�V<�J |\$���`�&��x�!�9�D�]��n��\0Ν4�C�S6�\rc�M����5��h�yK�3�8��3�cÎ�@�?(V���0^��c:3��ԥ�Иs���{�\r+h擮Fx;\r0z�îx�护C�p�2��@(	�[�x�2�(�Nv��e4=�ab��Rza��O��.RK�97(�����[ľr��JS��?N��;B0ZÀuo����\$��@in�M��B��a�:�NR\nC-&�!�0��ic!%-����q��tp%)��XK��hq���D�j{qn�!pmP#+@�	��\"Xx��7�Hb�=!���u�xA�T��������(jJޘO\naP��wHTC3k��m4a�� �\"��C.�	F�RrN��)a�u3U�I8uU�m3���\nY#䄠��p��Q	���7z0T\n���U.�K�_he\090�h�(m\"鼀�nMVT��q�8H��2fe^s���N�Ӂm�\"�V�j��n����PCC����� �m��S@�(����4a�\\�V�H+�3����\0�08�!�3�����I1B��3�4��K?�4L��-���\$�,��+=)�&��\0��!�\"ŶB� ^ɜ�/��)�O\r�-T3�|7��?H�����F)��)#!?{T��C��U�O��=>���#t�oY	�u���b��0K#�h\"��0[�iQr6��S\"�PT.��)JDT";break;case"de":$g="S4����@s4��S��%��pQ �\n6L�Sp��o��'C)�@f2�\r�s)�0a����i��i6�M�dd�b�\$RCI���[0��cI�� ��S:�y7�a��t\$�t��C��f4����(�e���*,t\n%�M�b���e6[�@���r��d��Qfa�&7���n9�ԇCіg/���* )aRA`��m+G;�=DY��:�֎Q���K\n�c\n|j�']�C�������\\�<,�:�\r٨U;Iz�d���g#��7%�_,�a�a#�\\��\n�p�7\r�:�Cx�\$k���6#zZ@�x�:����x�;�C\"f!1J*��n���.2:����8�QZ����,�\$	��0��0�s�ΎH�̀�K�Z��C\nT��m{����S��C�'��9\r`P�2��lº�\0�3�#dr��5\r��Z\$��4��)h\"�C��Hќ�(C�\0�:B`�3� U9������d�:��F�i�b�!-SU��P�0�K�*�pHWA��:�b�6+C��I+�¨��s7�Bz4��F���+H���(Z��#`+Z�(���5�7\r��6�#\\4!-3W�����e�z�j}7�݌W��&cT�=R@�	�ht)�`R�6���Տ�B�ŷc�>�Jl`����z���I�ݖ�цc���\$�f&G\\�/4C�7�6\"�ϡ���x��-7C���!��V6\r��%J\r�h��B�@\\D�8A62�4�� bj� �\"� )��:�=����߭�6���[%����J��\r�s���8>�|n�KI�\r��&z�\0002?���Y��>�Y�8�25�~��P75�6��/o�w;��E���0����GBX�w{8x0�7@z+��9�Ax^;��r46�(`]�z6�9ݨ7��	#h��O��G�/ ���c��ML!�7��Z����D�e�r	��&h��\"�I9�:�@\$\0Z�k<3a�0sx�Z�[ �虅Bn��#��p��� �~�a����u:�p�3Rv��1N�:CuJ��\0c8mI��|eJ�GH���i	N'K���lU	ს�ș�I	!0E�gN3.�:\n\n�)z8� �D@��C\$���4@.�X�����{�`�Tݘ!��)��M���Gb��	��@ú�oo�3��c\$!�cv�Й�0��0 \n��{��/�Er(��\"��N0�ђ������kت@brM��'�\0�'`����)�W�dK�r^eѵ&�3{�]�؅�0�G���A;c�\n髐�t �G�^Ϊ�#�l��\"��9+E)�P#fA�De&a@'�0�L� \$�`�R�9�u�����9G)%,@�BӃ�F)p��Y�i'��F\r�u�@��8u>��א`�Rr�tD�Q�Be(Td�	N��\r	%Dh��*̅6�9T����5A��S�F��)̰25I_C����w\"�\ne�)�F%\$�YOHg��� ���i��kiT5�XKX�l�`aN�|EN��H��̵c��`P��h84�5C2L�Ő�*�ɄrV��Z�d͙��eH�8���Ҳ`�:#��/�\r��T«Y�bD�6J!1�(ԑ�tzι��J!#�ڎGZ��Z�_�ʊ(�������Њ�� #-IH�÷s\$�����u	`b+��T**�g&T�i�LK�(NI��(%�.�o1���u~r��f\0�\0��m�1�ņw��@";break;case"el":$g="�J����=�Z� �&r͜�g�Y�{=;	E�30��\ng\$Y�H�9z�X���ň�U�J�fz2'g�akx��c7C�!�(�@��˥j�k9s����Vz�8�UYz�MI��!���U>�P��T-N'��DS�\n�ΤT�H}�k�-(K�TJ���ח4j0�b2��a��s ]`株��t���0���s�Oj��C;3TA]Һ���a�O�r������4�v�O���x�B�-wJ`�����#�k��4L�[_��\"�h�������-2_ɡUk]ô���u*���\"M�n�?O3���)�\\̮(R\nB�\\�\n�hg6ʣp�7kZ~A@�ٝ��L���&��.WB�����\"@I����1H�@&tg:0�Z�'�1����vg�ʃ���C�B��5��x�7(�9\r㒌\"#��1#���x�9������2���9��(Ȼ��[�y�J��x�[ʇ�+�����\\��FOz���\n��]&,Cv�,������[WBk�4�F�9~���lD�/��/!D(�(��H@K��C╖��=A��PX��J��P�HF[(eH�Bܚ�;�\\t�C��%%%���%�*d�7���2P�B��P��oD@gFuӼ�4Ȥ���dӇn��Qת��Kq8�\$􌄗cn4�c�霦;���I	�����\0�<��(湾r��\ns8�(%��xH�A�	���^ ����R^�5�ֶЦ����B�2�����]��JE�P����6D1�@Len�A�B	=���o򊠯�����\r��QR��]��/��X�)yQ�iz�'���&qR��[�:\$�Ah��z^^�ڄ�w�����Ja|�;\n�g變\"\r#��6M�A2�#w��Ξ��2���9�#�����D`�9\$�؅Ŀ;�Q�	�����>6����v�B�_�YÑ����� ���7*��K�'�|�u�_KQ�+dR+\$G��c/�\$\",	s�;L�S<CmEb!�:6��\\�j�Q�\$( S	<!tJ� �^rO��*��BT���\n��fab�:���\r	r��V��TŃ��<EԌb)((x��xE^2�B���!�\n b�>�%(GxMJ�%�p��R@\" z%��+��D;�Qo��@ \r�2�`z�@t��9��^ü���2���.L���P�/^�|��\"��`g�J!F��/ �Or��K)�x񀦩��TO���*E�@vT��9�]�}QIn�3-I�(����dh\$�0V���h���c%LQ��hM�1�G�wr!�7���(m��0�fr��ci�9�`��C`o��Q�/M�:�\0�)\$����65lkIZӇM�q����MA�d�N��r� ��b���R����2�>�H\n\0�@S\nN��>ȩ���s��/r�(!�)qCe�g�!�\0�C�w�������ju\r�ޞR��F�E\n�����柩�L��\0�S��L�;���鄶�&�8�uM��%*B%AD3�\$�\0�F̐�ğ\"��\n&�؊��#t�ն��,�4�p�:��S�Y�j��(e�KȀ�>e��K�)?I\rE��3ᚪi���%1q���'簚���JHSak��@e��LR\0��C3�K�=d�\\����Y�?�B�伡�j�Nw\0�¥�c�d�a�bxU�*�U�8��	�6�����T�[�,��L�\n�'�Lz3��ע�GlȈ�@�U;Ĉ��Ƽ�9�VL(�ɯ\\	� �R��9څpr+7s���J��O�h�f\0�X�[�z�fY���PbR�5��h�b��^pK4��?��F�e�;K������A,�Ρ�B�pQ�.l�J�Be�!ɳ*ڸ�k|�#�֬�[���3�*�(!���\n�l��)��xrQ/�r=��a�W�K0��VX/�/�\$ΑC����YBF)�3��kt3X*�@�A�F�֯�)�Na�=�!9w�g]Z�:�O���t��h5���8K��B���^��JPb�����o��)���ILg8�L �S䂭��4SMѼ�6W%��&�QE���%\r���.�mÿ��̞���܌�6�+��S�i�<+%ٞB�����k��s��a�F���qc�;m��6�ja �3��������.cj�}�*#ָ��+t�ۺ��f�?\"Ӻ�fI�5�ӳ2B��SAX�JbÇ�=�9GѠ�V�y9����v)\"T��}�}?D(";break;case"es":$g="�_�NgF�@s2�Χ#x�%��pQ8� 2��y��b6D�lp�t0�����h4����QY(6�Xk��\nx�E̒)t�e�	Nd)�\n�r��b�蹖�2�\0���d3\rF�q��n4��U@Q��i3�L&ȭV�t2�����4&�̆�1��)L�(N\"-��DˌM�Q��v�U#v�Bg����S���x��#W�Ўu��@���R <�f�q�Ӹ�pr�q�߼�n�3t\"O��B�7��(������%�vI��� ���U7�{є�9M��	���9�J�: �bM��;��\"h(-�\0�ϭ�`@:���0�\n@6/̂��.#R�)�ʊ�8�4�	��0�p�*\r(�4���C��\$�\\.9�**a�Ck쎁B0ʗÎз P��H���P�:F[*��*.<���4�1�h�.��o���)�Z��H�L�!����ʢ`޸�΃|�8n(�A�2��:��<���xJ2�4�;O� P�R�� j���X�T��\r&gD��jD�J�x��c��3�k[�L,���L�+\"8�x�2\rC��9��sJ�TC-��/6��T4��0����4ƈ�h0�tx\$	К&�B��� ^6��x�0��\nуp�M��.u�?�@���X�#�*�<�3�Cd�̳ik���3�7+.��ҹ�؆�Q�R�V�Nu�V��F��eJ�:&z=��0� 묌0��	�NH�1���\n�M�CJ&L��%PH�����4��p@C�C3��:����x�ŅѠڴ��r�3���*<d�(��JP|\$���⇁x�chԔ:Jt�'#ZD4��s�8���12H�P�3�M�i��@�h|�2�\n�D��8�\0��%��6��t�N#6����3�`�C�>�h465��%8[˹x\r���89*�Q\"s¶��x����4@P ��P@\n\nP))�0�GA g*ɜ3�Z�Q�&&����6[��F\0�����ù�y�9�´9�\nq:���\0�RW�H��`\\�\$N��t0�B�ovE�!�0���v ��s�\0��`vC��o/T��ٯ#���=��_*~j�<'k��N'��G`O�\$���=x����@�6\"C��6��&Y�w�����laY�*P��\"A�q���DƱ\"Y�#a�� �¢?������\\{(`�%���:B'�1�[\$N�\"Du�'rc ��0�)G�6��I��3���������)��Ҙ��*@��H�,(\$h3Jr�܈\nR��L��ʆ�=!4�;a2�&���8ZN�(�+���.�S�]\$�qQ�5H ��3\r0�V��4L�2����ۉ)E�,��rh�#�C�>��0-`73Z���2�19ϓ���S����Q��]JD'#�j��q\r��6�T��0�XN*�hФA7�2�\r�<svN1�T֦Wv�F�h��G�0�\\�KQ���U�\r��35ĠYz�x��Q	U\$2�B�#.��\rХ�4�*ҙ�4.����^\"�|�l��Hy��Hb�K�����k[�Q��Z(�V�";break;case"et":$g="K0���a�� 5�M�C)�~\n��fa�F0�M��\ry9�&!��\n2�IIن��cf�p(�a5��3#t����ΧS��%9�����p���N�S\$�X\nFC1��l7AGH��\n7��&xT��\n*LP�|� ���j��\n)�NfS����9��f\\U}:���Rɼ� 4Nғq�Uj;F��| ��:�/�II�����R��7���a�ýa�����t��p���Aߚ�'#<�{�Л��]���a��	��U7�sp��r9Zf�C�)2��ӤWR��O����c�ҽ�	����jx����2�n�v)\nZ�ގ�~2�,X��#j*D(�2<�p��,��<1E`P�:��Ԡ���88#(��!jD0�`P���#�+%��	��JAH#��x���R�\"��Z�9D����\$���H2p���\\�\r�2��( &\r�b*�0`P�෎�/��d��7�H�5��*@HKK�#��<��S:��\\�8b	�R��\r,�0LF�B��4�K�P��4|�B(Z��B\\�����ʙRK:n7(��j�7)%d�!��:�P��7#��X\$	К&�B��*�h\\-�7��.��y6��H6IJ���Opܹ ����Op��\r��߈��dE��ʲ�jR7��26���{7'P\\R\r��'�9je@�I�:Z���\n�d�H�7�h�\$�Z�%PS�6f� @��h�tČ��n½�K,.���^ �p@7�D�3��:����x﹅�#����H��\nbCp^)�6�,�7��^0��l��\r�;N�	J��=�k\n��%��|�4� |S����OX��Oh#�46�89�L�،�f\n�c9�ïq�-�ol�4݀�0��\0�4!�`ҙi���)����#��d�\"��0�F�4��Z��@���p���ʊ@RMB'�̅sLg���4F���� ?��64���K��M@����4=�����y��@��;�`�)kmn�ֻ\0�V��\r���0@R�!��J�z*0�8;;�Z�V'���Z�M�v!�!��\na��bA1��\"��CNC (\$�@�e�% �L����S@q��3�\nn%���w}q����� -_�Ȕ��f�H��c'��F&�Z�!r1ؐ��A�q0���QƧ��-0kiб��\r�i�i��ߣHL��J�0T~�8�m�}K�U�\"jwYنn�ݜ��x��P�sl���v�N���\r��`�b��Ќ\$ؗ������Ek�M�T�)�S�'��S�la���%�\n\\�8����@B�F��7+I��@�O. @Z��'.D4�\"76�*���j>��\n1fd�����kT�3\n\0)\n�8���yTML0L���P��ii?Կ�IS�eV!�/�BLN�T8(L��¦▪,St��r����Ki�Mb��FY�,괝��e51\$mMf��[+�(";break;case"fa":$g="�B����6P텛aT�F6��(J.��0Se�SěaQ\n��\$6�Ma+X�!(A������t�^.�2�[\"S��-�\\�J���)Cfh��!(i�2o	D6��\n�sRXĨ\0Sm`ۘ��k6�Ѷ�m��kv�ᶹ6�	�C!Z�Q�dJɊ�X��+<NCiW�Q�Mb\"����*�5o#�d�v\\��%�ZA���#��g+���>m�c���[��P�vr��s��\r�ZU��s��/��H�r���%�)�NƓq�GXU�+)6\r��*��<�7\rcp�;��\0�9Cx���0�C�2� �2�a:#c��8AP��	c�2+d\"�����%e�_!�y�!m��*�Tڤ%Br� ��9�j�����S&�%hiT�-%���,:ɤ%�@�5�Qb�<̳^�&	�\\�z���\" �7�2��J�&Y��[��M�k��Ln� 3��X�n�v�%�;C�����l4�B:�ʓ2sC'�I����1\n��I��B��i^�\"�#��!�HK[>��T��������!hH�A���DB:��3S��\n�@R�+����;����	r됉�C_��C �������~X��qR���L�=Oj�[2l�_&�\r�\$�����|��[\\��	���U�<�b��0�J��;�Ѱ\$	К&�B��c�l<��h�6�� �-G�MT%o�\"\r#� 6B�A@�v���:��2���7cH߮E)��,�C���6I)D�&��&Fx䴵2�1�����Tk.�,�C@��K��FF��l�x��I��<�e\"�J�RB��st���p��.���\\3?�(�]��%�V|�D��\\�y!��f�^ɜd��I-�╉.K�*2�W�Z۫�����ج;���˖��9t�	ı�{�Y/(��ArK�wztv�@4C(�Ah��80t�xw�@�0�@�{8.AA���*�Z�]k�0|��R8\$�`��\0x�>[�a�#�t���h��U#H\\�*�N�<���	\n2y��[�#lL��K我2`��aaѯ P�C`l�\n�Pm��0�f���ch`9�`��`o�Ep�wB�*1\0��C#[���6\$�t�7,�ED)�\0��R.!	��+b�	�T�)a�\0��;'p��8�6JAC/��w:�IY��E\0!���b����7�\0��I�i��1��B�ZJ\r�rBG��O@�Rd����X ���m��Q\$D��[p�Cx��E�)7a�NZ0���kkn�D���m��}o~�Rd���)%,���~�Z)3+.��E�T͢VnIy��'���20�dݛ�p�I!�:�Pҭ��kj�;̗�C�C����@`t���8����C(�b��X�fh�ч��`ZE�-�9�8�%TZ)(L@��f���#�8�\\��bIHN1�Fk��y\n��W�HÓx�Y�?E�ք�W��S\n!1֨V(��A\$�����R����jF���\"cv��ا>0�\n�U�J��� ^QjU��֦#&�j�?�̔�?kV��㣬Hl[�^�A!��Ŏ;�m���0�\\5�\"�uj-��G�[I�~��6��:Z��VȮ/��O�P)*�@�A·np��kKac��0�-�#���u<�Wq+HGq��֔���;f}I�3�LZ;>�\r�%�5IO�B����IO&��iݶ�[E[?E^P�����i�Ą���̺�T;RUʯD�6D��0&\$�\n��(�ɆO)5�4pi/�\$x�YF��R\r�O��0\n�8~�y%m�\0Zt����&�U'iuU�Y�U��UM��vwil���";break;case"fi":$g="O6N��x��a9L#�P�\\33`����d7�Ά���i��&H��\$:GNa��l4�e�p(�u:��&蔲`t:DH�b4o�A����B��b��v?K������d3\rF�q��t<�\rL5 *Xk:��+d��nd����j0�I�ZA��a\r';e�� �K�jI�Nw}�G��\r,�k2�h����@Ʃ(vå��a��p1I��݈*mM�qza��M�C^�m��v���;��c�㞄凃�����P�F����K�u�ҡ��t2£s�1��e�ţxo}Z�:���L9�-�f��S\\5\r�Jv)�jL0�M��5�nKf�(�ږ�3���9����0`���KPR2i��<�\r8'���\n\r+�9��\0�ϱvԧN��+D� #��zd:'L@�4��*fŠA\0�,0\rr䨰jj\"��8ޝE�L_�#Jl�Dp+�06 �		cd���<����0�.���\n��2��P25�����SK1X��1���pH����0��S���c�&B�;���B�(�\$I����h��4�l�\n��&-����#K�č5��:16j����5�e���\r-0�r5�e��(�]L[� �p\\VU�t5WU� KBj7=S��	�ht)�`P�8�(\\-�؈�.�V~�	C�CR�]p�Mr�׳iN=75��Bp�wGB���d\0�%�`�*H�7��2`��\$�B�X�ho<�:�A��ڃL\n\r�fL2�b�79/sE�C.��7P�D�A�KFBR�򐏳�ł�j�ΰ˴Pz�(\r���j������I��#vƎ�Nѧ�.F���O^���s�;�(�q��y��|*�����r��@��#Jj\$�Ot<��ϻ߱�ޟ���d�70Q�9�\$;3J���)\ncġ\0x����3�Р�t���\$�\"�Mc8^��c��7C*`^)��M	)��0��bR�oM\$H��0�h�Q�A�b؆�\nw\n\$�����4�LR*(E�;C���6Ӻ�Ω<2a��w6{��w./9Drw��Y\r'0��P[��q�b\"5&���g\$� M;�(l�:�Р�0�%�VL\n\np)z(�����[\r2\$-��,�0�Vt#��D�b�hA�\$93�������6<�~PL�!�7��H���Pk�v(#�����D�u�r[	�lP�������R�J)� �H9�GH����X u�(�D��5	eܠby#��B.��6�P�5a!t5J|ӯ��Z# 옄Ir:S��J3�=/��z�z=s`((�A\0A���&�b5b�z!�,�V�0'�\0� -cS`�M�z&q�5�h��3���q�� ��Hg'\$�V�B�Q�5\nĊv�s��(\\\r\naD&4T�Q��F\n�@:w`ɍ�|\$�2g�e\0��y1%���\$=O\n�(��,ݙ�p�)��Ή��o ��К]� oT��.w���]n��)��]�H\niP6�n�]�\"S���FP��(p��z���#�T*Kpq!Fi\r�ȟ��^B�R���G��TM�~?�X��e�r��1���YrQ	�u��3\na�j\n5W�t\$N�A�8n>�Uz�\r#6j���#�hቦ΄�e,�5RvU��ZD�%a�@���,i��u�2�%y���kZNI�\0��^lPѴ6*氭	�]��ѫ���ɳU]\nB���!����\"sg\09�RR���{Oq�>��3�}A��`���r~OЕ�@��#���T�Ap";break;case"fr":$g="�E�1i��u9�fS���i7\n��\0�%���(�m8�g3I��e��I�cI��i��D��i6L��İ�22@�sY�2:JeS�\ntL�M&Ӄ��� �Ps��Le�C��f4����(�i���Ɠ<B�\n �LgSt�g�M�CL�7�j��?�7Y3���:N��xI�Na;OB��'��,f��&Bu��L�K������^�\rf�Έ����9�g!uz�c7�����'���z\\ή�����k��n��M<����3�0����3��P�퍏�\"�L�p�p�\0��\0��%\nJR�̚�£������c\\��Ch�ڪQF2�B��:�	;V:��2�6�\$*���ȍ.��*�ʘ�+�+��B�0�es\n�����F��0�M�'\r�h�ʣ�\$��<�D^ʁB�4̀P������ɬI�MN��˒2ɦ�<4�dK�5�Q��3��R�5�\\�:P.ڵB�L\r82�T����㒆»Qd�:�#`@ɍ���:\"� @7�h����y_#�8�\r�H�� gf�3�ʛ!����%�]�e�*J�v�6�`�^��P�ZZu;\n�n�2��P�\nc��݁B��a�Z�,(ƃ,}�7I�3�	��ɫ�vɅ�u��x��8�S���H�(x(�0��@�	�ht)�`P�5�h��c|0���&\r�/CS+8��mJ��Wc�A�\r:pA�%ں�T�\$���h:Ϻ-Y�[@4%�z�§B����%G�M�7�L¨�fT�#��+�vշ��XN��ɖHx۸�c;��o��Dm�1R��'��n���O)���~ĝ0,�ʃN\0Cut�4�8N��F-P@�l�GR�oW�ȸdO�#�#��%K�'�C*3����t���# ڈ')p�ԟ�� ;!xD����EJ�5@��|LI�mO��5\0�M�&FT7\"P�UZ�4(��SV��FzčC2t�n��T;\$p��z��jg����	�i2�)�+�(j�\$!0(U0֎�]�%u������,%�X��`��Rkh�(����C�:4�@\n\n�4�|�2B�)�'d�&;��\rdd6˄���gp'+�e��B�d�:	*�<�0@aI�!n�ȢG��๮z�T�1@�#ɸD<��F�o`A\nN�X�@��0C\naH#rʁJI�E����h(�)Y%����*�VJb�e��@�ߒy )�<��7�����3�&�	��ix�@�W!#%!P��Y?V�I�������(���tj�*�5�@�D1��O\naP�6�� gU9���=0l'��^Ũ��<܀F��<r���KPrrV���h�%�E1|()�m�J3���	!D	K+d�)�����F\n���5�`���ٌ��yOI,���t:��\n�\0��s\"�G��1�����\"�2�4Lc	�f	�v�����i�m�+�]N�k�5�A��5_�I�c��XJ�ɉ�C,A��4'�1�+�f[҃n��I�Pd䝔��SC��\r�V�Ov��d��*�@�A�:ah3��%[�R!�.��Ħ��e�dw\n��2<Ka!gE2 ����h	�VF*�(EN���6l8��%��\n�ˉ���I	B������E(M͢1�vRbNn,�OL@���΅�%�)71n�Xz,)!�80�EL�K�qq[��n.#���.�\r((`�&�ò����1����̵���5�(Û�v�f\"0�w��Pgc/ED�ӆ0�\rd,xBp����H�D�a=g�[�|/�:>W��_[�}�?'��{��2?����9+\r��aވ	�p";break;case"gl":$g="E9�j��g:����P�\\33AAD�y�@�T���l2�\r&����a9\r�1��h2�aB�Q<A'6�XkY�x��̒l�c\n�NF�I��d��1\0��B�M��	���h,�@\nFC1��l7AF#��\n7��4u�&e7B\rƃ�b7�f�S%6P\n\$��ף���]E�FS���'�M\"�c�r5z;d�jQ�0�·[���(��p�% �\n#���	ˇ)�A`�Y��'7T8N6�Bi�R��hGcK��z&�Q\n�rǓ;��T�*��u�Z�\n9M�=Ӓ�4��肎��K��9���Ț\n�X0�А�䎬\n�k�ҲCI�Y�J�欥�r��*�4����0�m��4�pꆖ��{Z���\\.�\r/ ��\r�R8?i:�\r�~!;	D�\nC*�(�\$����V��6����0�\0Q!��X���@1��*��JD7��D�S�� S�\"<���#���Q�p��1ₔ����;���A#\r�I#p��� @1-(V���8#�R�7A j��������Ǣ��\r��3\0��jc� �sTG^\nc*Ajȫ�*\"�-T�2�B;U<��<C5X�CP[+Z�ذ�1��Vuu�6\r��\0��T(�3�@P�\$Bh�\nb�2�x�6���Í�\"�l�sR*�8wt�(�B�%IM��D�nb�D�+B�M��ϲ�n�O��k��SR�2��^� ��\"_��?�r���1}�j�N�\$*�L�*�r�7�X�':�����Z�k:I�n5Pð�V�>�%�R�.���lET�0�Uq�h:���qcv���p�R�����Է�k��T��ӻT{��'):��\0x���C@�:�t�㿌F�:�/#8^�y���\r�xD��JITk�x�!�T'�MV�f0K�	��\n���Z��rüU����\$�K�Q�C��*\0@lJq`�{�����IU��3S����x\$�v����cޒS�gkɭ��\"���5s\$L���T�T1zne�\0�(o@��������*h����<H�S�8��rV\rA� �h������� �t�	��\$HuĠ�<��)�\r������N4!\r�����y!�m`0�x�[daL)d��E\n�4 �\"��HJ�~%H��72W\nY�N&,<:�aJ�HIO���F��\"?Se5B;T\"JC2BRT�TLMˤ>��0#tRJr�q������r�Z�%����%i}I�v���mMo�3���g�YvF�MÆ��`8u��\"%��dC�kT����2��B%\r��X\0JP�)(�t0��<D�0��vJ�\nd*D�,I1ul��6��B*�l���'��	�M\r�4���CK��r&�Dɦ7���9]X�/J^��8fTK�~Tj�ՠ�Km��0��V�c�!�5Q�DJ_R.9���J�q�����M	r�q��*�@�A�\rUĴ6RG�M�f����)\"�e��BA�\n�7�Ø�L���2�ONuT��}MFH%�eOt�Pa�0���U-5\0005Ϭ6�0�QN�d� ��(J-a)'6�T��Õ�<`((M�~f�AKp�*5@��*��H���۸��-�h�\r ��\"�{W�b�;5;�kd7��w�K*o�5�]��69D�";break;case"he":$g="�J5�\rt��U@ ��a��k���(�ff�P��������<=�R��\rt�]S�F�Rd�~�k�T-t�^q ��`�z�\0�2nI&�A�-yZV\r%��S��`(`1ƃQ��p9��'����K�&cu4���Q��� ��K*�u\r��u�I�Ќ4� MH㖩|���Bjs���=5��.��-���uF�}��D 3�~G=��`1:�F�9�k�)\\���N5�������%�(�n5���sp��r9�B�Q�t0��'3(��o2����d�p8x��Y����\"O��{J�!\ryR���i&���J ��\nҔ�'*����*���-� ӯH�v�&j�\n�A\n7t��.|��Ģ6�'�\\h�-,J�k�(;���.���!�R���c�1)�!+h���,V�%�2֝��#�I4�'�\rb�k��z{	1�����40��\$��M\n6�A b����nk�T�l9-���ð)����� �D��妨� #�ht���I ���d�5��;-r�^����\"	�<� �*TRlw���Z�/b@�	�ht)�`P�<ۃȺ��hZ2��F�A(����H��j�<N��x^O��y����2�Ø�7�0(��k��:\r�{&�(�\"�\\�MpJV����z�MԺk%i�>���m֝��Z[e��b���LX�Xp|�b�5\n6J1��N)z���L�ӧF\\(�d��̔���BO18�|�٠����	�J!\0�9�0z\r��8a�^���\\0��h�7;�s�3��`�JX}3��D蝔a�^0���l��sz�/���������tl5ң���d���'i~,*\rh�1���;�#`�Oh����2����O��1�#��:�c`�3���:\r����X@1�&ތ#`�.�7&k�mr!/~e@(	�@\n\nX)4�]�6���7�\0��Hvx!�3��~���>a���״�a�w|�������u�°���?��9'��Hc|-�3��{ahc!�� &^��a!�8�F6I�X�jk,K�bLt	%�@H����	8F\rd������yjG���\nB��3&�\$��\"�a��@tQ�*48�b](--����\$�ͱ=%�}7����Nj��!�\"PGH4r\$�\$�IvHbU��@'�0��%!�\":�#0Z��T�JM:i]F�5Jd��s��oj&uX�s(�0TĘ��d�p\nFA)y2��0`S�=O&��:�RL�g&	�Nj�W������Q\n:gj�s�y�K�r�&4������Zo9��8�B<KR��hFؾ�	*��IO��m��;���3�p���[3��\$��DZ���4etDr�_(Zb�FI�%�S5��01f�2��\\�\n�Z��i��fbQ�\$�V�IZG(i�!�x�D��=�j0FD8�UJ`ję�Td�r��\"�f1�1��-�\$�J�ecFD���8ǫMx�.�G�	.(�e+�I�&jڔ�Q=��D";break;case"hu":$g="B4�����e7���P�\\33\r�5	��d8NF0Q8�m�C|��e6kiL � 0��CT�\\\n Č'�LMBl4�fj�MRr2�X)\no9��D����:OF�\\�@\nFC1��l7AL5� �\n�L��Lt�n1�eJ��7)��F�)�\n!aOL5���x��L�sT��V�\r�*DAq2Q�Ǚ�d�u'c-L� 8�'cI�'���Χ!��!4Pd&�nM�J�6�A����p�<W>do6N����\n���\"a�}�c1�=]��\n*J�Un\\t�(;�1�(6B��5��x�73��7�I���8��Z�7*�9�c����;��\"n����̘�R���XҬ�L�玊zd�\r�謫j���mc�#%\rTJ��e�^��������D�<cH�α�(�-�C�\$�M�#��*��;�9ʻF���@�ޠq��Fr�6H���\$`P��0�K�*モ�k��C�@9\"���M\rI\n�:!�\"��HKQU%MTT�S���PH� iZ� P���t}RP�CC���b�\r˛��pb�P���X����%�o���;��Z6�-�?��S�`��!��؟4u��6�}N���r�\rw����]�p6���~������~_�\06����\$�C��\r���<�Ⱥ\r�p��#��6\$����6�`A3�v`֩����²7cHߠ&�b��IK�5KZ7��2��0��WM�G���xEϥ��0�HR��\rR����:R���CP俼�`�C�\0�Qg��ҤDA\0x��\n@��C@�:�t��4N�j��`��&|�h:^)��6�\r��:�x�fL�4��)�E�5p!Ntl6��^Є)#,	�@���#tV�뒮�Mf��G3��4�σ6�c���s��#��2U�3o���1��0��Cxg.������kN�����C`s&�8�������2[��\n>�X1WX&p��(��or`�(��ф:���\"���W[C!O��;�blͩ�THi�S����le�ܹp�f�C� ��9����A�5��'!��`!�a�����D�a�'�Tܜ��2� !�0���zhd��f�\0K_ʈ����(i��tO	�@2%hΨ��\n�	G+.\$'\$P���g3��@t�	�I\"!�ӂ\0Ȗ�r!\n��\"�C��)A��\0�h\\�;�H 1�Ǧp{18�#�,Ʉ,	�L*�A�%a�������w<�����a��[-W�̈9�*�d��֙�A�e��h�(��Q	�� Έ0T��d�`�������t#�1(S��L�\$Nh�9��^��\$�i	�Q&6t�u�Jaw+.M���?F���)(ՁS�L��7a�����C�hsFt��r�X���戓p�A^@s)M��P��h8f�����\\���;'����Z��M�����z�Z��to�x�\"HHrq'�l�9�^��V<�����6��\\\nJ0P�0Ң��r0���-��&���pl����y�\"�(���&���\"b̒RR��E\n�M7��)S��	��W���v\r�\0��^�Q�%��� ����%r��;��W�wY�}%�]af�CҐ�:����W���؅��0n>P���xk@";break;case"id":$g="A7\"Ʉ�i7�BQp�� 9�����A8N�i��g:���@��e9�'1p(�e9�NRiD��0���I�*70#d�@%9����L�@t�A�P)l�`1ƃQ��p9��3||+6bU�t0�͒Ҝ��f)�Nf������S+Դ�o:�\r��@n7�#I��l2������:c����>㘺M��p*���4Sq�����7hA�]��l�7���c'������'�D�\$��H�4�U7�z��o9KH����d7����x���Ng3��Ȗ�C��\$s��**J���H�5�mܽ��b\\��Ϫ��ˠ��,�R<Ҏ����\0Ε\"I�O�A\0�A�r�BS���8�7���� �ڠ�&#BZ\"��H��B�M9�\n�&�c��K�-�Cjr�B(�!\$ɐꅌ�4��)��A b�����Bq&����5���ۯκ���h(��H�����6O[)�� �L	�V4�Mh�R5Sb!J���ůcbv���jZ�\"@t&��Ц)�B��a�\"�Z6��h�2RJJ�9�\"�ӱ�@@���\n�靬2������X̸@P��L;�1�x�3-#pʺ%m�%��dB�zV˄]��_�1/Ab ����(�8Җ˭\nf�?���< ����4R�0z\r��8a�^���\\���BP=8^�g�\n=q��xD��KV�7#�x�!�� �|�'�80A'2ID�{L�T���n`4�SRo\r#2Z*\rp�1�,d��I>�9�B;6�7:QU�c`9���(7���'\$����\0�K����,!qm:��L����\n@��'Rm<�'AB���c��k-�7��\$�2��56��蛴���6\r�x����-��h�3�kj%캏�W��Sh��i.r3婢�����{�C~��b��#v�BH=j�.\r�0��H]�F31g�Pڂ��)ɉ��9;'�������0i\re\n�ВC�Ɉ'i��2<��!7R��:�6�8m23��LܑAo6>�HL��=��(�\ny((��Ērbz_�E͡h\"�bSV&D�K��C�n��� \$(R4*f��<҆P�t\naD&@3.c���QՓ��p�[���/�v�S9�U���\$�u�m\"J+\$�SS�		kI�'�ԩ8����T�椓D��C�����`+�a�1�f�@ò	���6�f�dQ-���R6ވ@ \n�P#�p�Cpc��~V��e	��V0h՞�Z�B0#��gb�&0f (ܩRB���``(��s�v�4\$2j�����\n	vKDqSICsm\"Q���+�Z\0*�3�t�+_Lh�E���m*�UM��k��en��N�_��sx�)�S��\$��DTS�K���u�\0\n";break;case"it":$g="S4�Χ#x�%���(�a9@L&�)��o����l2�\r��p�\"u9��1qp(�a��b�㙦I!6�NsY�f7��Xj�\0��B��c���H 2�NgC,�Z0��cA��n8���S|\\o���&��N�&(܂ZM7�\r1��I�b2�M��s:�\$Ɠ9�[p��&�P�;PmB�@a3ڭÔ��u�܄+��َ�k��ٴ�rC�����\$6��ӄbs�äc��hf��)�ek�-f}�(�s�NPM,3w#�lԨɇY:��七��Ѫ8N�g{A�Z�J`�5�R���#(�)*Z��*J�@�eZ)����2�B��82��<7%q\n�6�R*�-�(��B#��B�!;��2ł8�7����!����=\r+k(�\r���%�*�N�C����C  �H�%\$&�p޵\$��䜍�\\8',��0�������\0�<��L�=O����I�xH�A��/�:�74���.�	s�3\$��Δ���(�b�	�x�0+ޯ�s2�O�-Hɣ�]f����[T��e\$��h'cx\$	К&�B��� ^6��x�<ۃȺ\n�;~�C��0�#����Z`�F���v�W����i\r����H��J�8�J�����<�d����:�\$:�>����7��*7Ó�:,��b\r�:�!��J��h�.7��*֢�#k|�\"�)5q]э-x�?��&L7e.2����.K?��s�4��#T2��5VߵO::�c7�����6;�0��ޯ��E�jنЗ&�w.O,�֕?*i�T��ux���Ҍ��D4���9�Ax^;�u���Ar�3��X^2��7��	#h��NȀ��|��mԀ�G��15\$Ȫ495��6M������9\$p���ݎ�0���<����P�`�w#7�0�d�D�%��Ħ�I�B1Ȩ��%J8���ri4�1bv���B��\0��c>���PQ�I1g�/2�K��\r�-Ւ�}��3\$��AX;�Mf�T\"HLI�a�2\"��O�opm뾀Ɔ��e4���=cH^I}%�*��EA\0C\naH#B��_�.�]\$�HL�G\r&�*3�(_]�X��x3��s><�1PB�\$e#)�.!�3���\rXr\"d�������,��4����@M�{��Ⱥlf\n<)�H��fG�ޯ��O+�/F�ʆ�pӏ9;�)��Z\$��\"H��\"�q(4)��\"dZ�R�T�L�\0r.O �I�8��\nQv��9�f� �u��|�9�u'\r���bX_���2AB(n�١P�,��O��E���BL�Z�6��1��'46��u�klg\$����\nL�m/%�b2T2�	a�}�zF_	�U\n���Z��I0�Q^+��E;�PU��	z�I��𼓵��^�0Z�%�&���z�0����#�x�:���U�H_a� ����R�F(�%�>4���0�Ԭ0�Љ'e����\n�f����AY���*���O�JTH\"�Kc>���((�ÕhM�*� T:\\��W1�H�4l";break;case"ja":$g="�W'�\nc���/�ɘ2-޼O���ᙘ@�S��N4UƂP�ԑ�\\}%QGq�B\r[^G0e<	�&��0S�8�r�&����#A�PKY}t ��Q�\$��I�+ܪ�Õ8��B0��<���h5\r��S�R�9P�:�aKI �T\n\n>��Ygn4\n�T:Shi�1zR��xL&���g`�ɼ� 4N�Q�� 8�'cI��g2��My��d0�5�CA�tt0����S�~���9�����s��=��O�\\�������t\\��m��t�T��BЪOsW��:QP\n�p���p@2�C��99�#��#�X2\r��Z7��\0��\\28B#����bB ��>�h1\\se	�^�1R�e�Lr?h1F��zP ��B*���*�;@��1.��%[��,;L������)K��2�Aɂ\0M��Rr��ZzJ�zK��12�#����eR���iYD#�|έN(�\\#�R8����U8NOYs��I%��`��tr�A���~A�,�[���(�sD���%�G'u)�X��ME�9^��EJt�)�M��txN�A ������EH��d�! b�����!8s���]�g1G�������[^�\"�E���t�%��E?4�rU�%�\\r����]/J	X�g1n]���0�I�2��\$�6�AҘ�Ie�y~��Mz���y},EҔ�=���u1��0�cΤ<��p�6�� ȪU7�?V��3��I!��X��Ö�2��9�#~�P5�9p�����4�\0�95�x�3\r�H�2��]sm�uP���\ry�II��(�v�#�8��z)8O�\$��T�H+���\"�i���32\"26&�.�qI����D�\0x0� ��C@�:�t�㿼# ��At3��(���?V���	#h��\r�P��|�_��\r�t�\0�CY�\r(}@w���s�к28�D�'�\$�+u��]úw��@�kc��sj\0b5��d�V�a�	\rP���s�����P ����t4_� o1�����F�#dp���3ƀ�bx@Ph���Tn:�D��8� ���Qe�2ē#�Y1�ф6���S���כfmM�e[�t9Ctq����;�#�	�D\n7O@9��\"IāA�8T>�Qr[���0��Hgz������C�9�iN)�TR��E�s �(���;hB��*'/\"�6&��#�|p�����S&C�:a�-��gňO���I�(�!	d�)����G��(\$�`��C i[��� �)�p��:��2�Pm�>F�*�0c��J&Ʉ@n`P	�L*ƺLUa�(\$�@�qC�Ks>�&q~G�bNB�|t���H�@���:@�Ms�s�T�5��\0w�hҚy~���F|.\nː@L�Hh�0T\n\n�ʇ쇥E�(i��֊�Z�dr���H��d��i-BL9�ش�YQؗlDJ�б�\rc0�Q�v��'eK�\$D!���\n�ia�� g��������k��մ6�3�B\n�P#�p��\r���U�f�3�bu\\�+Se��0%b���	�611���:����Pt�aDs�p�2H�)i� �T�FDɐ�>����'ܗ�~:�1��hU`��H0�=g��\"�����?����Q�Ā��q���Xx�����\"ז\n�#�[ݻ���q���Ϊ�}cג�J�)9���/3s�X\0�";break;case"ka":$g="�A� 	n\0��%`	�j���ᙘ@s@��1��#�		�(�0��\0���T0��V�����4��]A�����C%�P�jX�P����\n9��=A�`�h�Js!O���­A�G�	�,�I#�� 	itA�g�\0P�b2��a��s@U\\)�]�'V@�h]�'�I��.%��ڳ��:Bă�� �UM@T��z�ƕ�duS�*w����y��yO��d�(��OƐNo�<�h�t�2>\\r��֥����;�7HP<�6�%�I��m�s�wi\\�:���\r�P���3ZH>���{�A��:���P\"9 jt�>���M�s��<�.ΚJ��l��*-;.���J��AJK�� ��Z��m�O1K��ӿ��2m�p����vK��^��(��.��䯴�O!F��L��ڪ��R���k��j�A���/9+�e��|�#�w/\n❓�K�+��!L��n=�,�J\0�ͭu4A����ݥN:<��Y�.�\n�J�M�xݯ�Γ��,�H�0�0�����Եm(�V�/V��wY��<X�5�QU:�K�=@k;�Y�Od@�Gu�K�M̬��C\"K��-?4]� �pH�A���V�M�'�6͐ť�Y���%E#��P�6��I���?;�m�r��ֽ��ď�4\$��T�ob�!Ҁ�'0�f�[�傻��4��HTB�,���ֹ�Ӊ��>����r\0�JO�������Z���*�R��7[H��dm�K��T����W-������?I<Ī˓�ө�86��ل�ډj��>�5��M��|�u�M��Z��*\\��w䊩_ Eo�)n�;�_^��5��ֹ�Yꭢ���Z�d	z��Uy��F�B9�=�n>�r�ǍR�%��s����k�����GQ�W��7N�~p=S�(A������u���x�<�/�\0^{�WI����C�\$�\\֑���a�9P�Ah��80t�xw�@�0�@�Cpe@�7� ��(n��:C��C|:E|A'ʓ�����|��*�>%���B��Q�v�\\���=_��\$輗�u�q�1�-d�뛅�IH�Mei��9��_9�y,�G��rS��jXL�89�M��wK-\0�ײ�ʪ�{�A+v^�`A�s�>-75� ؛�)N4)Y�Yq�IE��b���G��F��v��}PD�H�����\0����N��DC�冧�(C`\\\0�\\Stkc#���뚗Ck�(K!�l Bh�Q�M�/����lVV'�:��ĝs!J���6��%��-�,%R�TA����#)�����\$�Jo�hKs�&�i�4�x�1�����F��g��K7��Ӣ��=�hT�	%7�J\$�!!<% 'q�3O��	z�٧���w��y�B�tF��)MLo( ��a�e6��X�g��'����׫�LOO\naRB�~����AN�_�X�;Ş%(�ק��2���V[�)@���s���I9a��X�SEY��I3��b����X\n\$��m�)Ṛ�曨F\n�B�)�/aI�bJ0�v��^�8 \n�/(��^������9I�4�in��Fk����X����A{�m�z�\r����w��#Ʊ�%���m�H'����6�\r�aq���(���\r��Hs�k�{a�Y��	H�#b��!� ��]���^�*�J\r<��S���V�i�Da���ij���D���nXiy7�{���&�*n�a�Z�Ҙ����(�a*�w,V\$p��;y�zjj�R��i�ro?�Г��V8��\nL�-�	�\"̂����g��c*�e�U��q���*����7#�m��<p���xxbu��|��Mݻ2���7>�I�j(J�{�9S��\"����X��J�U��fi2o5e�����#�d";break;case"ko":$g="�E��dH�ڕL@����؊Z��h�R�?	E�30�شD���c�:��!#�t+�B�u�Ӑd��<�LJ����N\$�H��iBvr�Z��2X�\\,S�\n�%�ɖ��\n�؞VA�*zc�*��D���0��cA��n8��k�#�-^O\"\$��S�6�u��\$-ah�\\%+S�L�Av���:G\n�^�в(&Mؗ��-V�*v���ֲ\$�O-F�+N�R�6u-��t�Q����}K�槔�'Rπ�����l�q#Ԩ�9�N���Ӥ#�d��`��'cI�ϟV�	�*[6���a�M P�7\rcp�;��\0�9Cx䠈��0�C�2� �2�a:��8�H8CC��	��2J�ʜBv��hLdxR���@�\0��n)0�*�#L�eyp�0.CXu���<H4�\r\r�A\0�<�\nDj� ��/q֫�<�u��z�8jrL�R�X,S���ǅQvu�	�\\����:Ž'Y(J�!a\0�eL��Ӛ�u��YdD��E�TjMH	�Z�Ev���%�MŠ�i�U/1NF&%\$����1`���O:�PP!hH����Y9��EBbP9d��P�[�J��b�0�!@v�d��T����Y���vHgY<�?I��Wl�\$j���ߥ����u|Iͫ�~d�2�eJ����XM�Ptu�� t��\"��\"�Z6��h�2/M�wKr=y^��E�T�\"\r#�06C��A	A�v���:��2���7cH߰(5�R�^�`�90�Y�J�Z�G�M[�v��e9�5Q*��d�o����iN�X������L��3d*�XV!GbI/�n�̀�U�]��I�%�\"l5�L1`�Fp�8\r#�����\r���C@�:�t�㿜# ����t\$3���������J�|\$����6��x�!�l}��7�#���#\\84�px�Cs�(.Pv9b<Y2\\cL\"\n�W���Xdѳ��B!�:6\$�Hl\r��1!���2}\$0�g`�C�ch�9�`��`o��B䘠�%/�7tHi!�9�\$ht�1�r&�(��A���P�d�;�<s�����Y�gJ�(!�8�gLO�8 �}�gw`�� �Zj\"\r�%Ð���w@�@���!��A������QZ-E��d�p�Ch~�3�hH�\$�E!�\r�1<�T:�)� �A�2�&�O�,��#�b��\n2P�S�rb�`@{�\0�GLJ�2�R�c&3X�4����q��@PJAL�<�)\nd2L�(!\$����P�iY(����'��!�\"@̄Ch /I�&(�C9Cq@���PB�O\naP�3�\\�E��<����^ E��t�Q�,SJyQ�Hྚ��,E�='-I�L�⦔���)v�Q	���2���P�C�C8�i�a+%��m�a/V[�z/�].7��{�ћ��%GA��W��0�~� rFb�6g{��\0^bZ�ײ2�U�~�f��W��r��&��M1�`�u*A\r���WDe\0kjh5߇h�A#��~��3�\nF�(p6��I	d� \n�P#�p�C�>�ȋf@�M����%^�a�1�κ�E�oɹG8�A�����Ĺ��uA\0uSy�3fu8Vq%]n��,K�R�Rk��XBv��f��˩�5u��(��q&)����^�&��bG�4\"�:83�e˧�:�<g�\"�o���\$�\0��\"�}\\[����^� T/�j�KЂ1�s,y�ZH�KX�H�͎�c?*D1n������[�";break;case"lv":$g="V0�DC���s�����e1�Mг��~\n��fa�N2�OFC)�sC͐�#&t�&�)��2��ӓ�F��D�	�m�� 2�!&r�8�	A\0��B�P\r&�A��e�NgIt�@\nFC1��l7AGC������F�\"�%I�7C,�.�'a��b:�'�#)����D�,<�o��bٸ�u������2��2�Q�@ ������S0���M����M�ө�_�i2�|����9R��?0��&�[�w0�DL:N�\n�\r�C(���Ģ���\rf!xb�o�|�0�0�Č��0��p@8#�އ'�H��\"Cx��@	b\n77P��.��T6��j�9�)�P�!��\r#�֯#ϻ��!mS4����4������mZP�CJ�O��2�B��U�j�bC(�6���d�B��B=6���@�AL��@��p�.2�l��Ϫ�� ��6K�<#�Ɯ�(zP�\r�X�0�Jbx�\"���A�@����B:\r5%L��\0P����p�pH���&�	Y&�=CP�1\rnj93Հ���L�����e:�L)W�c�LI��B��Ə	�,�I��P��JM\\�)��!VЍ��-���>2�H�\\ܷ��| U*\r~�7�{�x-��'�p�0��P�\$Bh�\nb�2�p�6���ϓ���m۴�@�.�\n���x@� �PŚ�ٸ����2��@ߢ��\0䢬rX�:Ut	�u�9�jZ�I�)�v����u��\n�P�):��/�SV��r=�4�p��j\\3�QI�w҆�^(=��hr���)�k���Q�n���I�	��\r\r׽�ó�7@�{b�����%<���Q��{�7����A�d��W;lÚ�U�H�3�.�H��Zډ7�8��6�\n����B2?�8Y	�J.]�NR���Z|&�z��3�Ѥ������\0x�\rP�Ah��80t�xw�@��:r��g�	�&�уp/EX�ډ�*d\r�m��x�>(h��\"���S��~����`wYc ��ϙf�BB��\0�B��;��_s�V��A�\r�G�bqBw�H<Cf�+�m@�>�\\R	>4F1\"�BۗI �=��\0���7Q	���	Qtm(��\"�BAV/�6dk	�d61h��2_T���o\"�cS:H�t��?0q���x��3\$\$�6�C�j2�t3���F7���@��k���6�VX�!MD���P��r�i��4%�]\\��(D==��/��N*ʻb`U��A�	yDs�\r�z��)m�G�@C\$O|�)����~Y��&��9�\n<)�HWH<`�U��PC�jLnM\n�v���l�DÈH)��4l���Z�D\n\0h�,,aD^�/'���TK�&&��)��LI�5&�ͯôr�))��r���2��/D���L�D���4�8@�E!����2��	^d��NF���JC��T8*�[����,�Vy��M�k�g嚖߲̃P��6�\0+Bmތ���1��+E)OijL�T��S�Z\$�Y�C5n˒���*�6�����	��7����D���\n��H��\$�M�/�͏����H\n2����3f�Q���l�5𜬲�2	ʒ��IZ�H @��X@EW�%�&=�V���bX�P7�o=��s%	�=ާny�*��]g�.ued�����|����M���q�K�v�t�u�R��z�P\$\"%�HOh������2��\0�,�0.�(`�\\A�;�����wG\$,5���2Ôh�|���	�H.";break;case"lt":$g="T4��FH�%���(�e8NǓY�@�W�̦á�@f�\r��Q4�k9�M�a���Ō��!�^-	Nd)!Ba����S9�lt:��F �0��cA��n8��Ui0���#I��n�P!�D�@l2����Kg\$)L�=&:\nb+�u����l�F0j���o:�\r#(��8Yƛ���/:E����@t4M���HI��'S9���P춛h��b&Nq���|�J��PV�u��o���^<k4�9`��\$�g,�#H(�,1XI�3&�U7��sp��r9X�C	�X�2�k>�6�cF8,c�@��c��#�:���Lͮ.X@��0Xض#�r�Y�#�z���\"��*ZH*�C�����д#R�Ӎ(��)�h\"��<���\r��b	 �� �2�C+����\n�5�Hh�2��l��)ht�2��:���H�:��Rd���p�K��5�+\"\\F��l�-B��8?�)|7��h�4�3[���\nB;%�D�G,�Z	�i{0��PJ2K��5J��%SRTâ�,�ˁA b���x��*������:�S�4��(��T�ȔS@P�:<s��\"��tP1���˓��U4���FἮu��5\$�I�py.ׅ균�	}_���0����ƁK��d�@t&��Ц)�B��\"�Z6��h�2Z�Į����*���X�D���-\rk*�fM�p2��ܔ���H)�lZ#�K��̨�3�b�2�o��4�T�3��P�b�i{��;�*7)(b�2��|�)��n�U����(Zʶ%6�ײB̬8�6cRF��O����I�\r��o�@����D4���9�Ax^;�p�2\r���,c8^�����\r�xD��H�8.���}���EӢ�Z5\r�C�K��5Gh��5�4�Od#���#�g���1��@;��eJ��Ð̱�� �3.m��1�l�����\$E����Pi�))x3��%��Ö��\0i\r!���c,�2�l�-���Q�P	AA�D��A:\$�!���3�R�lΗ��Iy�2�(� ����8�m��\"�P��57\0��JB�Ԇ0�Hgs��P�lÛTLE�2���R� ��La\r������q�rm�����W!� H(��@�o�\"�yD����^\\HdPŀ6��XsRGga�f����W;,�:�L� &��!���\rA�8��:����m�:��}C\"�0 �<I��/f�\0�¤�eA�Ƃ\0�I\\�>2�mHi��% k#\0���,�Q�\"��3V�@�r(\$��G���ю�1���2D��b�,�x(��>g��a*B���	RF�0��l��\$0- ��L\\�\"0K���4Q�I��j�9����C�]D�20r^���4_JF���u)`i�t�S�IPLawA\rl�W2CHc\rl�����K%�:m��3��Oh�`�����\0�0-�1���I*=\$:dh��^t�1#�����݃#g�	R0��?�d��F��%�ՔN|[Rn4�|9\$�J�DP<�,�X�a{u'��ym	\\\r��!@�mb�3m����\$h\n	���6ؖiK\r˕}u��Pe8D)VG�\"^q������Ԋi_ꂮ��qY�����\$M��RQF����\$�!B��N(��4>%�Mʂ6at�:��";break;case"ms":$g="A7\"���t4��BQp�� 9���S	�@n0�Mb4d� 3�d&�p(�=G#�i��s4�N����n3����0r5����h	Nd))W�F��SQ��%���h5\r��Q��s7�Pca�T4� f�\$RH\n*���(1��A7[�0!��i9�`J��Xe6��鱤@k2�!�)��Bɝ/���Bk4���C%�A�4�Js.g��@��	�œ��oF�6�sB�������e9NyCJ|y�`J#h(�G�uH�>�T�k7������r��\"����:7�Nqs|[�8z,��c�����*��<�⌤h���7���)�Z���\"��íBR|� ���3��P�7��z�0��Z��%����p����\n����,X�0�P���A��#BJ\"�c�\\'7��E�%�a�6\"��7�.J�Ls*���\n�	.zh��X�.x����I�%�A b����Br'q�0��Ц�2`P��H�z�(\r+k�\"��{�\"���2�sCz8\r#�oM&�a;�ʏ��zt4��`���\rd�	@t&��Ц)�B��i�\"�(6�� �Tt��B#�\r���=��01\\�K�t��(��ɂ�Ĥ��`��Cd?# (��'#x�3-�pʒ��LS#/]�����K���#r��1�L�v6bS27�')\nF\"\n�/R�D�(��k�3����,Ӊ��\n�.��d�2��/���&^I59Sc �-�,�[fZv:��l��)��4C(��C@�:�t���(���=�8^�pw�}{\r�xD��0��x��w\rF�4�s\0�6Cz̜(O�a�S~�!3\0���C�0�hB��\n>��3��N���H��1�o��3�����H�zo�\"�r�hȟ!�|.�(��{�\$-ؠ\$\n	�x\nPS_�s%�\n���:�<,n��@O���LL�잓�^[ݓm���W�k��Ճ\r8�d��h\r!��3��ܚJvNT0�&[�>)� ���IQ7�84�Cr�x���������F���g�cѣJ���2�%�e�\nwe\n��_Yt8':�0�Q d��C��!:�x�y�+b�l��27��PY�4A�,��`�L>Mp(��{�h�,0@�(cT'0�5���Dc\"�0�cj��S0��r�R(E��%J���	�=B/R�3,���F�����e��Fb�8�Ư�� A���i���9&��L����;d�=>��3�[�Ue�|4>Xc-����#TQ���#fq�\$3-�[���ލ�T��Y�a�\$�\r393ոd\n�(F��?�z�)�T9��tLH8O�2�㒴-V�|Ṙ���Ī��fD���Q�UX}[&�~N�C�J��B&-&q�(F`�&��\"!P�+D��!���\0�T�dP�G5��RiG�h.���r\"^ZZ�5A�";break;case"nl":$g="W2�N�������)�~\n��fa�O7M�s)��j5�FS���n2�X!��o0���p(�a<M�Sl��e�2�t�I&���#y��+Nb)̅5!Q��q�;�9��`1ƃQ��p9 &pQ��i3�M�`(��ɤf˔�Y;�M`����@�߰���\n*э�:�|�m0��KĤ�=�B�F��'�K��.O8�Rx��wE���ّʍ�9C\r��ֿ�E��#�9���o�Ehi�?�ȕ5�����u4��>T�@f7�N��%Y��X��S)�6�!�Bю�h�+âj��H@�M����(�j��*����%\n2Jנc�2C�b��O3ІJPʙ���a�n\"X:#�H�\$�#\"����@ഃP�ïC������r�1k�N�.�*.7(#\"�#�s҆�R�����E�l`9��x�\n����X�����d�H�Ԋ9��6Ibr�:��W;��H�<�`M*�S��0�K�\"�hH���-'�R��C\n�)��\\MB��#I�p�\"��\0Ҿ���0���5(Nø9!K�M��,�68Hh��,��Sl��b�X[��j7�P�\$Bh�\nb�2�(��cU�5��ԩ�˕|��\"�D0��⪂\r(��xl�ʐ�:\r��&�b>�9c`�93�\$3�����hma^�]8h�����]@PC�6�:a`@8)��� �/KڋM������H��/���g�vm�/3g�i~��\r�mH�Z���j�&`:�cH9�-p�EPI��H�ͪ����j_&���k�f�H�͈A�2���@M�%5���D�0z4c�r�x�مɎ���Ar�3��{�McJ��J�|\$��s>��hhx�!�@�a��4\r�sO\0 u�A� j�@�f�4� N\n8д�����0�2�_g=VX��'�|\n��\nu{�U�7����bPG�=7�GC1�L��4%&��̑�B�`�A���S \n (1x8I�=!�ל`PUAI5ZmĔ4HR��.��c����:(� ��O��#\$��\"�h�@̘s6j���R@��t\r6�maQ�{E��0�MH� ��!�0����L��s���r'nA�6��ɩ7'\$잜䂷Ta�\$h�����C^�C�� �b	���p���NC#�id128sF(-���d[+�����݀PP	�L*�PI�!P)e6G-0�\\�� �8�p�Je��c�t9I��\n�c,H�3�Ub�� \rf���2��Q	����4BIq0Pruӄ`�	Nx'M9+c�%��fD4���'5�J8����rmP\n��}��� u�!5SlDϳ��l�+Y�jL���ADB'\r��c��ڑ�\n0���X2� �NҐJ_D^!T*`Z8n�G�?\0�Q[lIZ&]M�P@r	Ib��R��)2��A��V�����e/��VH\rY�*2�un�	= 6�, ���L�XR#�\raS��Q|�eĄXc����%�ʚ\n��	�}�h�P����\"��,iqD�����䘣Z&aՓ\"B!X���2�|ȗ����!��y�Ն'��9o\"䰃��Y��3Fck�\n\nV�\\\"c�";break;case"no":$g="E9�Q��k5�NC�P�\\33AAD����eA�\"a��t����l��\\�u6��x��A%���k����l9�!B)̅)#I̦��Zi�¨q�,�@\nFC1��l7AGCy�o9L�q��\n\$�������?6B�%#)��\n̳h�Z�r��&K�(�6�nW��mj4`�q���e>�䶁\rKM7'�*\\^�w6^MҒa��>mv�>��t��4�	����j���	�L��w;i��y�`N-1�B9{�Sq��o;�!G+D��a:]�у!�ˢ��gY��8#Ø��H�֍�R>O���6Lb�ͨ����)�2,��\"���8�������	ɀ��=� @�CH�צּL�	��;!N��2���\n�8�6/˓�69k[B��C\"9�C{f/�2��3ą-���\n��.|Ѕ2(���J�'.#���`�!,�1O�5 R.4�A l���@,\nv�\r��΍�ʀ:0/�\0)�lS�2�BC\$2A+�����z>�P*\r)�W����0�ML��ְZ�Ԏ�u>��J@��c%�E4�H�	�ht)�`P��\"�Ms��0�`V(�D�����1���h{^�(�\r�4�\r7*��HF2�����	���#z0�C0�V��\n :�d�:�@�:�M�؏(C��d���d�bv89�hA���H��x@88ct�k�j��ZMC���湽��@4'�0z\r	��9�Ax^;�s6����3��^��x��J(|\$�����hPx�!�!��c}zʨ�3�I�V�?�\$����f�E�|\r��5c�J:���R�\"�3�i����Ec�ϣ�i����1���:��㖶v�Йuc�����\r+v��jfH;F�����0�'�s5�(	�[����\\(�J����b�����-\"�l�L�{C-/qaֆ�P���_]I�5p)�4\0�+�#�82F��PNv�4�7��;]vpi��PIJIIi4ބ0��3\r\r�\$�3���KaLtA�2�F_�[%e<��\$|M�%'��2�����g,쥳����)	\$D<�b��Xo?E->�HHh��q���c�LBdm]���ҁAy�)\02�i�����wH(k�����^P�Y�07lJ`s\$��GN�AhkKD�3�S�~'��4��c�\0k2Dp�rDI�� !L(��ZI�+�j�*foCKyTN<�Gh*�ʒ[\nF,�0�v	כrq��2G&QA{1k�o�IJ�ON��=��BVjϞe\r��i�JB#\r��5����td��ГS5�I6Nq�:6�T�ᆆP�yC|4�)��4�34���T���:P�ָK�eR.+0|M��A����b\\'�y,��qK��<��ڒM��#\$Қx�D�\\i����Iz�\$��:m(���A��H'�`���|g\nǤ��n`�[�:�	iA3�RZ�M�p��0I��\$)�x0P���]@P";break;case"pl":$g="C=D�)��eb��)��e7�BQp�� 9���s�����\r&����yb������ob�\$Gs(�M0��g�i��n0�!�Sa�`�b!�29)�V%9���	�Y 4���I��0��cA��n8��X1�b2���i�<\n!Gj�C\r��6\"�'C��D7�8k��@r2юFF��6�Վ���Z�B��.�j4� �U��i�'\n���v7v;=��SF7&�A�<�؉����r���Z��p��k'��z\n*�κ\0Q+�5Ə&(y���7�����r7���C\r��0�c+D7��`�:#�����\09���ȩ�{�<e��m(�2��Z��Nx��! t*\n����-򴇫�P�ȠϢ�*#��j3<�� P�:��;�=C�;���#�\0/J�9I����B8�7�#��H�{80��\"S4H�6\r����,�Oc ����\$@[w8�0�4�nhº�k�Y\0�cU'>� ���ȓ1c��o���S�\r:ʎ�R����PH� iX� P�=�[� ��b��pc\n	�J�:H���2�]& P���H�#,P�1ȱ�{f6II�B�S�`+��D�]��R�)���l6�\\�7��^�Ŵ�߃��A^���\$I����@�	�ht)�`T&6�������P�7څ��&����6@J�@���\0ŖE��^9f�8����8ߞ��J�\r�ʂ��N^3�>�\nq:i<ݔ%��4P�V���Sr1�X�ʌA�;�X�3�#��r)�K��:9wް2kJ�ˮ��Nö�{.�9��X��[~>��@në��(;�c������|.�8���qۊZ��<�*:&گI9�pX�v��~���J�<����z�D(_�v#\nch)\nP��(#:STC�\n��z�p@(#C 3��:����x�����������`^2�h�|�x\"*\0��,��K���\r@��|P��s\r˝�R��Pme��dТ\nQ%��jz���(t�2���ë�#�ԇp@@P&�P4  �àig�	m�L��`r��\$����z	a���0�b2�J�:6�����@A��H]�`s3�ǆ�J�<pN�(b����˜m����xr�	y1&e�I.��2�D�C�r���k�\0Rߡb4gXL��N1D\n�JD@�7����Cp���X�,� ����0�S�OF���# A	tT7���CنZ�jB&L�����i�#�X�Kd'	ɘΆ��J���d�@0��3�\nn��;�P�KA�,��S�dH�5����ܡ9'd���BD��T��\0�C�Y:.H���_&�^p���0���.A2?2:�Y�\r&��2��Фp���=y4�d�`{�h6������)�D�S���e��\"�2�D ��\0003M �GCy\rUE�����Xk5!L(��(L�.A܎O�\n�rjo*V@��PlQ�M�8�)c�()\$\\�|%H`��I��S\"�:��a	�iR���c&ˬݕ:N�S�G��R�I�T�P��U�0V���+`��Y�U�!� �\n�YU#�{T7��9�� �ҒM�Y��1 ��Y��2)E���~��XU\n���mll��/���W�Qg)��T��ޱH��mAw�9�KЄ�U�yĪ�߫\0��6�h	�&�0�Pb#�r�G��k͍O<�2�P��!D��\\ŎS٬iĐ�cQ/�I���q�<��{�#�JF��C�\reF#X��8���@W�����{#�B9�:V\"�̝�&-[%Pn�d?�l���SI��Y�'J��s��=&�H��j�40�l�����&}5(9o/�h�p��";break;case"pt":$g="T2�D��r:OF�(J.��0Q9��7�j���s9�էc)�@e7�&��2f4��SI��.&�	��6��'�I�2d��fsX�l@%9��jT�l 7E�&Z!�8���h5\r��Q��z4��F��i7M�ZԞ�	�&))��8&�̆���X\n\$��py��1~4נ\"���^��&��a�V#'��ٞ2��H���d0�vf�����β�����K\$�Sy��x��`�\\[\rOZ��x���N�-�&�����gM�[�<��7�ES�<�n5���st��I��ܰl0�)\r�T:\"m�<�#�0�;��\"p(.�\0��C#�&���/�K\$a��R����`@5(L�4�cȚ)�ҏ6Q�`7\r*Cd8\$�����jC��Cj��P��r!/\n�\nN��㌯���%l�n�1����/���=m�p\"�m��1A8�#�2J��%\r;��J�0����딂2i�r'\r�3.��2�!-1M!(��؁O��xH�A�(&��B�C��6V�8@6\r�r�'�S;&=�H ͈�\0׌k����jx4�b\$� ����#r�(�JV�S�=��%	Tl�Ӵ�0ڍ�ҕ�I��3��Ȑ\$Bh�\nb�2�x�6���Å�\"�2ٮk��HR�2���\\���C8ҹvsX��\r�Ѵ�d7��3�o'��II�6��k&�;�ˡ#����b9��2@���.�	�l0���3\r�X�	��U\$�0�L\"�B�\n�����@ �C:3��:����x���Ѷ���ˠ��`�Y�xD��H�85�s��}��p��\r�B0�p8�H�Rz��Ű��)S��\"ذN���d�f��n{���L�#�8̺I���3mZ�ǩc0�W�����m����.��%cfN�2�Dc����'P1\n�^\\�AB��j0O���\nI9^F&,9��Ib49�y�sfj�j�6\nb#z~�azW�����A�Q�Q��0�`@^/\r��=��&�^A�&N��7�2��1�x2�`��O�C\naH#C\$�(S�7�u4��,.-�������MQ��Q_�B'h�洧V�H�~ �-z�0K[(�/1�pH�y4�! ��h�)�6Fu\\��4M�A������tf�x�xS\n��)�rx�WX �ZDDP@�C u!d���|Fd{sF���T�Kry9���uf�ι�El�A���m��6 jd�\0�Bb�@�u\0� =SB����D�\0��(f]1%=�1�N�@�LRi1� �OchƎ锟�^s����X.]��0�B�\ng�6�0U��!H(9���ge�nW��%bN�C-W��׺<�d0\n�P#�pI�pc�!�3���gT������~g��q�d!u���S��%��f,�	ф\r��Ę��X3�̃侗j�lv�(�U��q��|L�]���>+q�������K	�L\r�H�Rp`�E�1t�W�'��F�e�.�QZs�Leʣ�P*IgK0��J\$�y��9z�c�V�\\��H�^M�Y0�R�U��R\r";break;case"pt-br":$g="V7��j���m̧(1��?	E�30��\n'0�f�\rR 8�g6��e6�㱤�rG%����o��i��h�Xj���2L�SI�p�6�N��Lv>%9��\$\\�n 7F��Z)�\r9���h5\r��Q��z4��F��i7M�����&)A��9\"�*R�Q\$�s��NXH��f��F[���\"��M�Q��'�S���f��s���!�\r4g฽�䧂�f���L�o7T��Y|�%�7RA\\�i�A��_f�������DIA��\$���QT�*��f�y�ܕM8䜈���;�Kn؎��v���9���Ȝ��@35�����z7��ȃ2�k�\nں��R��43����Ґ� �30\n�D�%\r��:�k��Cj�=p3��C!0J�\nC,|�+��/��╪r\0�0�e;\n��ت,���>�<��\ni[\\���͉�z����z7M*07���J�A(�C����4ہC�@�A j���P�B�N1���0I�\r�	�|�Њ2�G3j���`Pjz4�o` �c���4`�(P)k)N��\r�\r��JT�%�H]NR�\r����ys��K#=�	@t&��Ц)�C ���h^-�8h�.�\r���:������#��&)�W��5�D�X�e��c>�\"�c�5Mb^�\r�0�9ю2��.U�ͼ�+{L42:�7��F¬��40��bA\rC��a\\������':#*r&��2`8Bp�|�i�.�Zь��D4���9�Ax^;�v��ѐ�3��_<E;��J�|\$���k���^0��q'�.:(#��*R%�M3v�7��1��q���6�{Z���ԝ\r��1�n�@;�	K�^4T�#6�hRF3�N��x���;ϼ����B\\6^��:4Fy+/e��E�D�7Ab��(AЃ�AAX\$��#3\$�	a\$Ġ��3��!�7\$�٭l���8G��%r��9\n�ѝ�p�A\n;��к���\rm��)p�pC�*!��4G�BC\nlD�7�s�RЭ8�溁�%Ǎr(���͋_Q��(�C��� (E�?C��ܪCQ%D��c���d�5T5\\�^�\$���V�\n�\"ĭќphձfCf�����-?�\\�Bp�@g�a@'�0���>'����ΕN�b	t2RLN�(ř\"%�\$�*e�Fs���UX�u������W-B\\\"��Q	�n�0T��K�g�w�hf��9t�%Y�ef�r.d|m_�8�\nJu��⹍��Nd9߄�Ҥ�;���\"r�V�oD�JU�BlU^t2x�p�yC`+���[`��).�峒�䗌�-W\$�#MPڇ�k�{�T*`Z8c\r�H7z��\0�˔�ƒC�a��F�!���7���}&�56��I�bK,�\"vcbV	��4�`��C(c4a̅6�cV3�T���R�>٢�0��:J�cdMGUܝ�F_	ʅ�����U<=A@��t�0��.(��.�v])N{��\nV�T�)Rj�\"���`���Y�<?�(�-��H}5�,��	���5��[�";break;case"ro":$g="S:���VBl� 9�L�S������BQp����	�@p:�\$\"��c���f���L�L�#��>e�L��1p(�/���i��i�L��I�@-	Nd���e9�%�	��@n��h��|�X\nFC1��l7AFsy�o9B�&�\rن�7F԰�82`u���Z:LFSa�zE2`xHx(�n9�̹�g��I�f;���=,��f��o��NƜ��� :n�N,�h��2YY�N�;���΁� �A�f����2�r'-K��� �!�{��:<�ٸ�\nd& g-�(��0`P�ތ�P�7\rcp�;�)��'�#�-@2\r���1À�+C�*9���Ȟ�˨ބ��:�/a6����2�ā�J�E\nℛ,Jh���P�#Jh����V9#���JA(0���\r,+���ѡ9P�\"����ڐ.����/q�) ���#��x�2��l��1	�C0LK�0�q6%��3��̎A���A�2��Sb�n��,�93�`�3�������pʁ3��@�+��ﴡ(�\r�\0����CʰA@PH�� gh� P���5j,;�[O��:@CZ����	a:\"�ޘMw]�\r)CJ\"'�(Vt�HO\"8ȦT���p(���l��ت+x\"\n63a�b/p���x*��h\$	К&�B���8�6����\"�y=舦�i¥`+՞����V��hK�9������أum�3�b��gc�w4	(\"b�PZ&T�@1����R�ޡ�(J#���8I�PXA�:�λ�YJ��̰5�z&¯�?ģ�~�p\$N�`����D4���9�Ax^;�r��VC�\\��}g��7��	3{+?�A�^0��B�@\r}~ལZp�&�c~���ӽ�4�1���%�r�73[\0�4'����x�2~�1�<(���sr+�30تы�8��(������\r%���t���&F���k��:�1�sp��8C��K�\0PT�I=gq�%��p\r�p7F�2��~�Ðt)�%\r���ù�'���6K�\"*���w��!s�����\n!\nu�Efޣ\r2\naH#C��`JB!0�6�@�	H}�1�\$��JJE(�y.�UnkR�MC�:?VX���P5�A�A=	\$\\<�\$.U�E4!�霂�y�uRD����R��^��1�t,q�J\"7�L��PO\naR���{O\$v\n�<���\$Gê-VH]�(�6���kQ�u@Bl��qJ��2�s2y�i'h��5��`N)M��`�Ba[G&�`��m��6´�i9lD�+c��2T`D��I�hÐs,�4�P�\"֨���(�Q�h��ht�Hfb����h6� �K�\\-X��ȃ,�X���f�MZvj����J6�j�CY7X\0�;��֕z�k5N��u���9\r��H?�bB�F��zl}���R_�X�+�td4 O`���/#\r5\\��2e�&�`�Y�X5�I���hiG��-��U��W1d��X�[��錡�C�Xc�U��pC��j5]_�VqU*�)E���* _\0Q5Mʔ*�y��1Dԉ��yRO\"ĺ�\"DY��eVdZ�Y������΄5d5�P���J9!��";break;case"ru":$g="�I4Qb�\r��h-Z(KA{���ᙘ@s4��\$h�X4m�E�FyAg�����\nQBKW2)R�A@�apz\0]NKWRi�Ay-]�!�&��	���p�CE#���yl��\n@N'R)��\0�	Nd*;AEJ�K����F���\$�V�&�'AA�0�@\nFC1��l7c+�&\"I�Iз��>Ĺ���K,q��ϴ�.��u�9�꠆��L���,&��NsD�M�����e!_��Z��G*�r�;i��9X��p�d����'ˌ6ky�}�V��\n�P����ػN�3\0\$�,�:)�f�(nB>�\$e�\n��mz������!0<=�����S<��lP�*�E�i�䦖�;�(P1�W�j�t�E���k�!S<�9DzT��\nkX]\$������ٶ�j�4��y>����N:D�.�����1ܧ\r=�T��>�+h�<F����.�\"�]���-1�d\nþ����\\�,���3��:M�bd�����5�N�(+�2JU����C%�G��#���\n�T����,��`#HkΖŵJ��Ljm})T�ʣU%�c�Ļ����7�\$�qNˀ�8N\$@#\$_̓��W(mԌ��l�q�/�8���u�\\��Y(�\\��75���-���Zt��9D��Y.Bh5�C��%���A j��p���B�8��Ge��x�Z,�rhA	�7<2A�M��-�Xa�Ζ�Ȳ<|V�Au�h�����Hj�����)hc��*�d�R���7�y�KZ���H��})���YW�k�V���R�_�O¯p�(���c�%,��\"��q��!��A�;jr���6+Č�e8th)\$�w\0(�>Z�wd-�E��.șf�fa�L����\$\n�.S���8z��J�C�14�쩷mv\n\r@\r���\"6���T\$o���4p��QJ!hy���#x����il�8t�LM��L�S�#�rҼ�y�6���BFO	��A*<;���@��CԱ6nU��� SƄ�*#h �V,\\'!R�s��(���\"!��C�ǆ@W^4/0��E�DҬ8)�.��|G�aPq\n���_�I�p~'B\"�	\nS'�Z��S��1.�p��2��S�lTL�.ҘǗB��h�O��>��-_�l���.��+��b���%`����X��a�q_I7x�ZQ��w��Bb%�l@�0�\0��(f��4@��:�;�P\\C m\r!�2� \\Ðg�7N0�' s\r!�r�\"����*5;�u�xa�,�B��+d�����.[:;���J#��vK*N��@����,&�'��ƋՅ%����0�Q��YM?uĘ�lC)��B��W e�(I.�=,�@7\r��9\nO��X��r� ��<���F��գ���|�٥/42�@�����\0&��ڠ����X���\"u��#�R�_I\ryHusQ��鐀?Q�1TȚ��q-Yd�G�7��S4�	�'SE1G���`T@��'F��D�B����Hj��!��L�u�T��VaL)`[�lz6�ž��	BF\"EB�J�L��yP���BR���\$+�-�X�#� [��ԋjzН\\\\1	�[8:(�6l�1=>��%i�� O֙wO<�\0Ѵ��A�Xv�&{P� ͙�7e+n,*(�#� ��@��[E�Z3\"_�\"W'��\"�P \n<)�Ivp�q��iRE�|���,g�h��Gb1�jL+��1yX�6���h�b�J�9�F�b�r\r�����{&��}�#�9\nM=a(�BQA��iW�0�-�z*��!�\0���:�]���ӎ�Pp\$����'bM@e�K��چ#Eۯq(��ӰőD!����A���	'���P�x���KN`���oL�X���8:W1E�qg�}��7�Lᣦ-�;\\״n���V�����MB�\r��h\n����H��v�����ʤh�GP���r�л�k���F��ojB��&C��n�\r\n1�Q�c\n�R������i�p��D�� �_Y�{�Ȝ��s!���PCN'bx��@�#�L?lT���n�\n,�QuLK���3��1_;����7��6��hG6s{�B�W�)�^C*ڒ�,����f_�/㯖�Thc���b;zN��@����w���.�a-%�(��cr��2�ŉ���LIbXm��\rV���3��^�LG��\0�	J����6�M��� eXg'q�g���@ Q#\"U����í��6��;℗�7�%��7gkÛF���� G^v\"(��=f��CD���M�	\0";break;case"sk":$g="N0��FP�%���(��]��(a�@n2�\r�C	��l7��&�����������P�\r�h���l2������5��rxdB\$r:�\rFQ\0��B���18���-9���H�0��cA��n8��)���D�&sL�b\nb�M&}0�a1g�̤�k0��2pQZ@�_bԷ���0 �_0��ɾ�h��\r�Y�83�Nb���p�/ƃN��b�a��aWw�M\r�+o;I���Cv��\0��!����F\"<�lb�Xj�v&�g��0��<���zn5������9\"iH�0����{T���ףC�8@Ø�H�\0oڞ>��d��z�=\n�1�H�5�����*��j�+�P�2��`�2�����I��5�eKX<��b��6 P��+P�,�@�P�����)��`�2��h�:3 P��ʃ�u%4�D�9��9��9�� �֎@P��HEl���P��\$2=;&��9ʢ��䍒HA:ӥ7E�s���M��*�� @1 ��V����Y�Հ�֎�P��M�pHX���4'��\rc\$^7����-A��J�Bb]A�B�=ʢ��)Y�(Z���P���,�FRQ,�:RO@4I�z�*1�n#w��m\\2�c\n>8�4����9�O�����n�ಞa���3�]�\0씶I(�G	К&�B��C#h\\-������B�2K��ڰ	�c�\"�Β�)�f���Cu,7��M�=&cl�6M�S:���`�3ؚ0����wҕ�w��G>-c(�2���O�L��z��;I����!e?I�*ʙLq�<k��R��H�)���<H���\0x�\$�(��C@�:�t��t/�j��Ș��> ���xD��H�8'P�:�x�iw�Ѝ���5��>�=hǧ�p�x��ch�K\"��&��s\$�\"�ЦOC���\0w#�W����1MJ�0�fZ��?p��:�B@]����?�*��\0ct�I闰،��{/�`����\"@	���V��:�X�\"�4�ya�\0�\\+a��\0���R��o�7w���1��W!�jͪA�|�wP���|&��4(��u���7\0�Ы�U���2g|ݔ�p�0���JS{�@�!��RΥ&��Hr}ʄ�9��JX��8�PF�vz�i/&!�<����6'*���B������,+P�N%!\$���=\r�J�4h9Q��7]8q��d\0��dw�`�A�sI���\n�4[k<\$�F\$��xS\n�٢ˇ�xTh��'1.��L{e���T��u8��5L�NâC��	�Lp����\$�����Q	���4�E�0T\n7*�]��՚�1���̂�U��쇓�@˲���ÃD��\r!�!\n���Q\"IP���(IJ�U'XȢ�vH vz�;>fHt�zl\r��5�3�>I�S���D��:H����d�HF�@�����T���VF�<�`t����F�U�z-�u�1&)e�MIVf͆�gX�qy�V��X9i\\��!��P\nK�#�������j�1�6�d�S\nɯ.Z#\nRF��y%1F1\r�פRM��\$4e��4N�##j�]�I�HL\r�p6�4���/���&�`~�Jh��\0����!<d���%hfp*�3��`�PU�S^A�)�P��9&0\"�K*�t^Yk4�49��ͽ�I��F�l`ҨR��8";break;case"sl":$g="S:D��ib#L&�H�%���(�6�����l7�WƓ��@d0�\r�Y�]0���XI�� ��\r&�y��'��̲��%9���J�nn��S鉆^ #!��j6� �!��n7��F�9�<l�I����/*�L��QZ�v���c���c��M�Q��3���g#N\0�e3�Nb	P��p�@s��Nn�b���f��.������Pl5MB�z67Q�����fn�_�T9�n3��'�Q�������(�p�]/�Sq��w�NG(�.St0��FC~k#?9��)���9���ȗ�`�4��c<��Mʨ��2\$�R����%Jp@�*��^�;��1!��ֹ\r#��b�,0�J`�:�����B�0�H`&���#��x�2���!\"��l;*��1���~2���5��P4�L�2�R@�P(�)�ϐ*5�R<���|h'\r��2��X�b:!-C�4M5\$�pACR�<�@R���\\��b�:�J�5�Òx�8��K:�Bd�F� ��(Γ��/�(Z6�#J�'��P��K����<�@���-��g�hZ��-`��M�6!i��\r[6݄�[����l�[V�4��M��\r��x\\�\0엏I@�	@t&��Ц)�P�o[�.�K�(��â[���/\r3h���5\n>B9d�����8ߖ�N�<6��d�1Ld����2t�5Rh�#;�\$��Mk))���8he\n=������\\pA��@�Y��ѤO������?ÜeQr����X2���D4���9�Ax^;��sm�*�\\��|�ep~\\7��	#h���cp��}��CD&�2V�� oU��s�\$'7�n�<4�H�ICx�7�0z�9��1��x@;�Ce&�j�̍Ip��3mh��1�p�:����y���� C��%�����旈H+z�40�,�A��(x!\$���!t��Z�H\n\0��RGI2w����^�yPyA�'�,f?�lҟp@G�\0wP�*<R\nl���?�`�2[��u?��\0�\$(� c_,�3�ǟ\r�hai�e(�d��IQ-9)� �֖y�ZF�� ��\0 :�	��Z1&dԁtd����f����x#�V �ȑ �,��3^l	��� ɉxI\"a�Œp҅A�A�Q�BR\nC��'�����Kq�� 1��h�)�3(���vd�C!蛅\0�£ZN�5uEo\$a��r>I�k�ƈ��e�8���k�@m�;���)��2� F\0��`��ZA쟺�8��@r&n)�(��I�2��7J���=BeJ:O��RaH_Aؿ�ST���F9}��\0HS�>�.\"�EK҂]h����Es��)1zQ�6pc������(\$��hla���jN�h'� :��Q�xF�@�/�2�\rB�T��20Ƅ΁x�q�;�4(a4�^�V���N��}`\$����BCY���_u�Ò�[��v_U��ִF�ٳ�D��B�mX��bb�jh\nE�����UEP��Bf��А���KB)Du�3�����JK�`o�f�ilM��8�4��clpQ�C.��և��\\�|�*6�V�Ҥ��X��ÜK�\0\n	d��+��-nD�%R������ˀ4';֍��`(";break;case"sr":$g="�J4��4P-Ak	@��6�\r��h/`��P�\\33`���h���E����C��\\f�LJⰦ��e_���D�eh��RƂ���hQ�	��jQ����*�1a1�CV�9��%9��P	u6cc�U�P��/�A�B�P�b2��a��s\$_��T���I0�.\"u�Z�H��-�0ՃAcYXZ�5�V\$Q�4�Y�iq���c9m:��M�Q��v2�\r����i;M�S9�� :q�!���:\r<��˵ɫ�x�b���x�>D�q�M��|];ٴRT�R�Ҕ=�q0�!/kV֠�N�)\nS�)��H�3��<��Ӛ�ƨ2E�H�2	��׊�p���p@2�C��9(B#��#��2\r�s�7���8Fr��c�f2-d⚓�E��D��N��+1�������\"��&,�n� kBր����4 �;XM���`�&	�p��I�u2Q�ȧ�sֲ>�k%;+\ry�H�S�I6!�,��,R�ն�ƌ#Lq�NSF�l�\$��d�@�0��\ne3��jڱ����t��6�]*Ъ��_>\rR�)Jt@�.)!?W�35PhLS��N���k����@[��J2 ��Ά7=Ң̷m��^	{̒K�\"���\\w�b��o�\\�3���ϲJ	�%��O�jC���6�m�ֹ ��8�3j¬c:ϵ��HJ��t�*HOKu�擶֔1�1�v(�Cj����˫ �(\"�]��45,/+�� �j^Y~��������y�Ĉ\"�֨���Ƌ��B������lȎ��(I�:ZB@�	�ht)�`P�&\r�h\\-�<h�.�Y5��d���P���X@��^7s�A�t(��Ø�7��Z�+-�P�:M�v#��7��0�	�\n��NH�g-��P�'�d6��姚ۭx�5q�-b#��{�L����YnЖ��{���( P��㓋\$IC���O|�\0<&��`z�@t��9��^ü��2׈��g�7A�Ws������C��\r�p:�^A�9����tA\0m!������!�n��5��b�y\"�̘�,E��d�2x���f(AP4�ã�E����@�pF�µ�C3�HA�1�����f\r��3� A�Ћ��0°@��,\r!�62�f�LL�έ�QK�}-��F:]&�\0�\$�[�����\$�)>K�!���g:���s*�H��:����a�`Ÿ��ǀa�#�Y����=\r��:�g����a����c9ؐa�0�TtZ�!cV�5�0��2Sz�5��d*��chϼ���E�`��ҕ�<FR�5���ﬣ:A�r�R'�U,��4J�cPґ�CBAqN �E��l��jA\$���vJ�8i�nv�{�!��\$̌�h 0V�(9!��:�S#��l�rPQ�'�0�'�X�i��m%�U��\r%\$ށ9j²i[�y%*�Qd�Ij�P�ѣA̔J���'�2��j�QT�#to'b.:q�\n;��9�\0S\n!0i~L�RT}4aBE�5�\$`p��L�a���\$T��\"2��[fQ��2F��kz(m�ht�\\9s8P�r�Z����L�\"j�f�[BtB�����6��}.�	��X�]�-�lo������X�%؆EF�p�U\"�@(#Y��;�h���*�@�Aãp�\\��^(�<��SVՅ���l�l�+S�͑2W���9���Q%��u�\\�3f-�R*���f&<�����X�f��;��\0j��÷Q58��kq�#8�qK�j�Oo<���gR�yh��IU��s-��Ƀ���b'�6��X�L��J<��2��;�1U��\"�EfĬB�e9q�`�9b�+)�Y]sP�\n{:`�iS��[Z��l��QbH�ucKZ�G/p";break;case"sv":$g="�B�C����R̧!�(J.����!�� 3�԰#I��eL�A�Dd0�����i6M��Q!��3�Β����:�3�y�bkB BS�\nhF�L���q�A������d3\rF�q��t7�ATSI�:a6�&�<��b2�&')�H�d���7#q��u�]D).hD��1ˤ��r4��6�\\�o0�\"򳄢?��ԍ���z�M\ng�g��f�u�Rh�<#���m���w\r�7B'[m�0�\n*JL[�N^4kM�hA��\n'���s5����Nu)���j��\$���ܢ�����ܐ�o*H�#�����2���J@�)���ʫ��)��:O*��O\$\"�C��8!`P�:��lb\"41�rݵ�K�!#�P�!�셼8ʴ���з\r�����8�7#��H��:������1[&�\r�p&&��5��J:\nX��H��+K�d<������4 AC#�50cp�5A b���0�)�����b�!�m�C(��#��3�F\n:#% ���e �J��`�)K5 H�T&΢�#X�1�l2��`@� C\n�\"㝝h4!uڶ�'E�cM�o�# ʚ\rêj\$Bh�\nb�<߃�[��\\�h�������H����B������D&\r*#�(�삓[7#0��M�P��R:�b3>\r��+�d#��<�r�7J��^Ʌ��l9 岑7#l.�\r��iqf�^q�1Z��hjA=��Α�i��j:�yx�Ȣ\n�^)P颮��2��H��	*n84c��h���9@�2h\$���2?�un�\\���n�p@%#C�3����t��\\\$Z�\$�(�8^�v��>���p^)��6�	�l�0A�^0�خ��BH3f�\n.��iM݉N��<�4��Ѓo��z��%*t���&R���h�]�8ִ����z��,�L�Rg����^���F�2%���L\0/�%�1� �LI)A��\0�lc��9���V0�r��t@�Ԛ&|� <\\̙��`�p7˜��z��)�=�!�<E��6/H��,�����2@YÓE֊}���ȫ͊O&	H0��4!\r�(��\0��	I�A�:�����&�䝂�L�\"�(Y�+�.k[�a��r�[a�����@�Ԉ#C#�<4\"��C�fXE�\r�\$C#�3�R��@�)�B&)��sX��B\"\n<)�F|9�������GV��s\\�I�8Si8����x�ܥ�!\$����ǟ3S\n!0���f�HF\n�A�׈��C�%ҹ�%B��*j	̚Ք����E�Ҁ���PQ�7��A0�4M�!Ē���ζ���3�D�.%GL끤q�RE�M\$\r��5�U�ؤP�˾7���4�\"�e����N��iT*Gq;J*w��(�Gg�-0TMq��5W=X�Uj�2hê�O��+��kɊ����b�I��\n/Ę���bqLa9�!�B�r\r�ҟ*INߥCMs�#L`�d�:�M7�N��y%'�BE��^�v���\\8KJ�P�X�9�xv�S�6�e⹮��`����WՍs��\0";break;case"ta":$g="�W* �i��F�\\Hd_�����+�BQp�� 9���t\\U�����@�W��(<�\\��@1	|�@(:�\r��	�S.WA��ht�]�R&����\\�����I`�D�J�\$��:��TϠX��`�*���rj1k�,�Յz@%9���5|�Ud�ߠj䦸��C��f4����~�L��g�����p:E5�e&���@.�����qu����W[��\"�+@�m��\0��,-��һ[�׋&��a;D�x��r4��&�)��s<�!���:\r?����8\nRl�������[zR.�<���\n��8N\"��0���AN�*�Åq`��	�&�B��%0dB���Bʳ�(B�ֶnK��*���9Q�āB��4��:�����Nr\$��Ţ��)2��0�\n*��[�;��\0�9Cx����0�o�7���:\$\n�5O��9��P��EȊ����R����Zĩ�\0�Bnz��A����J<>�p�4��r��K)T��B�|%(D��FF��\r,t�]T�jr�����D���:=KW-D4:\0��ȩ]_�4�b��-�,�W�B�G \r�z��6�O&�r̤ʲp���Պ�I��G��=��:2��F6Jr�Z�{<���CM,�s|�8�7��-��@���Z6|�Y���L��\"#s*M����/YC)J�iW�P��j���_��P*�#���D\$�c)IJ�6�a+%�].�I�m�|\"�ڣ�GZ��h����]XlTґ�qUh��J2FW�fF�;~�`-�s�d�����O �xH���[��;�d�����园��#y��=0_��\r�ͱ�P���!^� ����Y�qR�˫_��o-\\�Pšklx\$1s+�ů�5�u�/=�}mnB7�v�Gm�w]R���������ząۯ�)�~�Cܷ���q۞���,�����nC6z�P�5ts@PH	\0�&��t\n�������y�A�.��\"m��q������'�����|Rf\rд�)�b��*���R*#��ȋs`,mݭ�ز\0Q�;��9 ��0lI��0�\"-% k3��g��5a�1x���\ny)'\n�� ����A�z,n2�9�|i'O�ӚnΞ�ac�>A�c�\$��ķ�'���.]�'\n��J[�SF�r���U�^	����#̟�rn�8����\0<'z&�`z�@t��9��^ü��6�4֚�8/�s*C�J���\$Ӟ�*��<�B�@�O�on�o��x�J}L�0��v�����\n��;))�e�\"��X�����ː��A�!�:C�@�Xl����Sn�3JT���a�:�\"��E�!��В@X� r�w����UR�%H�r�C���I��Nu�Q�%�((��R'�m���3e2���b��szo�PCT���\$��|O)�='���V��Ðt>�;'�nPýn��&&�\n�,Ú~�5�2�����uO��AP���d��扟�\\�uN%x!�0��A�0ʽ�>�	��+R\r`�&�d��4��J�7�_��mS�K3Lp��|깒��4�d�\r5��ҶȂ�DaHV��\\��i�B���8�\\G%l�ԕ's��˒�Bg,.�s��%븧/g7�m�e�����se�V�(\$���w\0d\r-��'����>48�Sޞ2i\r�� �I�;�5�L����[]��8��do!�j�ro��\0�¥�D5fC0�\r���<��U(Ƕ��Յ���� _��W����\0� (j�3��C����*&�S�Q�\"ҏHC%P\\�����PA,�^L(��A�aq�a*T���I�O��a�AS9�mP�[u�Ӥ��h�E��d@DV\nXRzR���.�`>�x7{\$��ym���Q��K�X(	'�6�tͮ����9��}e\$^�H�zٙe9' �]�so��5Y�_V�ֶ�[�lb�^�i�ѩbmF�՟��� 6�HCk\n�;�\0�M�h��4�`�\n�F��~�'�)a\0U\n���e��RI+��l:#�ng�ҿ��^�׮�Uq���G:�]�dsF�Gl�U���=Ye�d���x�����:r8Q�g��ٺ{KcK��t�.\\2{�.�jJTIH��䔨y&��D��>�c��n���\$�E��A^~2�x�Qf�V�>\nA�6f%J�.J=���ƶD�g�o��n#B��,B��l3�>�_�r�5]��h���Ͳ��jjNI������1ߚt��M���A�)�k��#�v=�ɂ:�9Q\"qL�Őy������̙�S�V���ew41��7�^Ƥv�7�|9'��>w���2/��]�j[�o�&4�����:[Q����ϐ[�";break;case"th":$g="�\\! �M��@�0tD\0�� \nX:&\0��*�\n8�\0�	E�30�/\0ZB�(^\0�A�K�2\0���&��b�8�KG�n����	I�?J\\�)��b�.��)�\\�S��\"��s\0C�WJ��_6\\+eV�6r�Jé5k���]�8��@%9��9��4��fv2� #!��j6�5��:�i\\�(�zʳy�W e�j�\0MLrS��{q\0�ק�|\\Iq	�n�[�R�|��馛��7;Z��4	=j����.����Y7�D�	�� 7����i6L�S�������0��x�4\r/��0�O�ڶ�p��\0@�-�p�BP�,�JQpXD1���jCb�2�α;�󤅗\$3��\$\r�6��мJ���+��.�6��Q󄟨1���`P���#pά����P.�JV�!��\0�0@P�7\ro��7(�9\r㒰\"@�`�9�� ��>x�p�8���9����i�؃+��¿�)ä�6MJԟ�1lY\$�O*U�@���,�����8n�x\\5�T(�6/\n5��8����BN�H\\I1rl�H��Ô�Y;r�|��ՌIM�&��3I �h��_�Q�B1��,�nm1,��;�,�d��E�;��&i�d��(UZ�b����!N���T�E��^������m�0�A�\r��nB,�]�*;\\�I�wB����9X\\5o}aS{X,�B� �ֈg%'�幋��\"��PӃ,Ŋ�g(�����+�v�\$#\"L�CIr�/���A j�����(b��w;�D��4�`Zb��`\\i�l���|���ʙ�[��:���,��d0���jvʫ8gN\\gN��u����T�q1ij��]Gՠ�eS��U_t���S�������H\$	К&�B��xI��)c���P^-�e�j.�yz�%vx�ıB\$?5�@�Shn���?����(x@��9���y�T�A����Q�=A�9���0lJ����P���H��֚p�i\0ihܕ����sa�f�n��P�Rdn5f<���\r�ꥳ��XOVI���S��b��,jm�4S�I�\\���\$X��6����`:�j!E&��LQ`��C0=A�:@���/��F��l#NI�3�����\n��*L#�Hm�6�p�xa��R�p�ڏ� \r��5��ҡSt�\rҙ�sPsVʝ*��\\� A#�\r�`*��Ct�@�;����	�3'Jڃf�\n\0:�0�C0u��7�t�5%�h?�9@Jz���0��~�L��9�i��Z╂�'T\0�+7Ah:ܡ\$�Y���H\n\0��R�_pV���S��3�]%L��p�|��)T3���}��?A��(0��	O��~���O&d΃���G�桧=LM�[��T*�Q!ɵt甑�l i��uO��6w�ҳ�\0�!�0��[:O!)|�h)�~�͍�h��}}�H�6:֜\\�;�YI���7E�qaS�d��DXWKav8F�0�vVsN۟�ͅG�����;��]_��IC���4�����n� ����O���6�\0�\$\$����v'��P�1�A�\r�W�+�qNΒX��WI��)\"�e�jHR�&v��^T�@�kHtP�\nZ���s�4�1���k��J�ǞB�V�5����۪Л���? �MB�Q	��3S�@}��F\n�l0�*�(�%L�W1@&�ܜ��H��ƾ/8y���[\$�!��@�tq����4��	|l1C�7���E�VW��d�v��M��ߌ��{���K�,�����W���V�c\rw�����3**em�Ұ�0m�I�l� @B�F��\0�9_M\n�%x'&��z\\�Iͼ�w8�D]�+a(+q��C�N�&t��.��_.�!��8�(��ݾ��Ȝ�8WD��7L�q���ˍ�YS���<dK��f|9̾3>܉&\"�,��\nV���X	��\r���S�\n�r>��v�\r��,l1XYlsA��&�����:��)��4�G#	͈�+6�r�WuA6.	�Gk�	]84���v^f��(";break;case"tr":$g="E6�M�	�i=�BQp�� 9������ 3����!��i6`'�y�\\\nb,P!�= 2�̑H���o<�N�X�bn���)̅'��b��)��:GX���@\nFC1��l7ASv*|%4��F`(�a1\r�	!���^�2Q�|%�O3���v��K��s��fSd��kXjya��t5��XlF�:�ډi��x���\\�F�a6�3���]7��F	�Ӻ��AE=�� 4�\\�K�K:�L&�QT�k7��8��KH0�F��fe9�<8S���p��NÙ�J2\$�(@:�N��\r�\n�����l4��0@5�0J���	�/�����㢐��S��B��:/�B��l-�P�45�\n6�iA`Ѝ�H �`P�2��`�H��<�4m� �@3��m��1�Q<,�EE�(AC|#BJ�Ħ.8���3X�8�q�bԄ�\"l��L�?�-J���lb鄁�\\�xc!�`P����#�떠��&\r(R�����2�k�Z�ld��#��b�8#���b=h��t�W��c ��	�PS���Xu����	x�e�K-J�b�t\"��戋c��<��h�0��8�\n�z!V��Ƶ�J�\r���p�<C�r��i=IX���6I`Q�C����2'�*|9�и���c��:����\rx�͉��\0�0�PH@7�c��܌,�x�\r���Ä�6e\"8�H֋�n�C�[�M�����\$�~k���,�9���;z&���#�[��3P�:��\0ؼ�4=��h�ڲ���Hw�AmÔ��E��m����2(sTy�,�6�������D4���9�Ax^;��u���2J3��k�&88��J(})��ߑ��x�Bp�����lܣ�b���.f6G��c�\$��R�n,/	Բ�6K{�����X�(�i�k��O��g�\"�(䓎Ie����0�\0��U@�����D��Q\$,�\0�D�o�Z�0PQAH R�mMr�S��R*������lei?�4-O��1�%�#�\r��<&� ��>���-��[���ٓ3\$:DȦ\n��\\g�9'���8 !��c]Mt1�����N��@ )� �CQ�W.@#P�b�+RAF�rRJ�F&����bE��ON`4,V�>r1�7b��Q��@�zI�TNC�L���'j�Z�'�tOi�4a��/p���Ry?p47vX�K�y/`(�\ri ��E5y*�X�o�D��# �Q#Ȕ�! �C;\"z�(�7������A*A�H';2S&e��6Lm�*JL�xrL�VH*lߟVFS�iS��ÇB���!��B t�i����xd��[u=�#�HP\n~ij(½Y��l�5�ΏSjUH�J6�MyB��'�A�sFp��^�A\0CIa������)C@�*�@�A�\r��v:�^��'�r���iRו}�e�ӕ�g�u�d~J�z�ّ�q.g�͛5�*q�9Al#�R�K*@a��ė��j%|��	T�0K,�\\�E2��n���CB��y4��˙�2�E�e���mS��F2�Q62�^J�U��'��N�\"���p%���E�XDeO�V��JRu|7Z��(yZ-�컡��SHyo�Qx�eR� ";break;case"uk":$g="�I4�ɠ�h-`��&�K�BQp�� 9��	�r�h-��-}[��Z����H`R������db��rb�h�d��Z��G��H�����\r�Ms6@Se+ȃE6�J�Td�Jsh\$g�\$�G��f�j>���C��f4����j��SdR�B�\rh��SE�6\rV�G!TI��V�����{Z�L����ʔi%Q�B���vUXh���Zk���7*�M)4�/�55�CB�h�ഹ�	 �� �HT6\\��h�t�vc��l�V����Y�j��׶��ԮpNUf@�;I�f��\r:b�ib�ﾦ����j� �i�%l��h%.�\n���{��;�y�\$�CC�I�,�#D�Ė\r�5���X?�j�в���H�)Lxݦ(kfB�K���{��)�)Ư�FHm\\�F �\$j�H!d*���B���郴՗.C�\$.)D\n����lb�9�kjķ��\\���̐ʾ��D����\rZ\r��qd�隅1#D�&�?l�&@�1���M1�\\���`�hr@�:������,����΢[\nC�*�(�m,��r��L��J�4�\"�윴���GUN/�����;s?K����s3��BcH�(�Ȃ4^�����~�r�}M��t�%İ�pH�����\r^�2�[\$��CkJV�G��A\\D�[sPבB�Xƍh����65҄ԩ�\$�c���ї�W(���WF�-^�&��+B��X{7�1��p���R���:ڒ���;-(lN�ɳmN���z�ŷ��UGH���-r4iV��&/#�d�\n4��s�^��v@s��m�1�	\$X���4�c�6��@7�A\0�7u݇e�vC(�:v��7��M�M�tZ6��l��rt^�y=`�=�˖:Z�7_�>V��h\\T��2b�`\$�+��jx\\�d�fA��\$;���5`B���&�)a����|J/���GLڋ��&/��'���K�Y�Ч%�p�^��m�}��'�� ����%@��L`[ja���A�93��t��������]8'\$9�l%>�\0��TI`3�y�H�����S��N��6��.��^Z#��K��SLEDF&g��\n�yB�3)c�N��RLN.:Sײ�%�G��o��K+��������\$�E��o�\0< �4 ���\"\r�:\0��x/��CHn��;@�ݼ�w���^�8>��S��a���0���	��O��D��Q\$�,8D�CG�aԩ�ze0���͓2X��\r��RA��b%��I+�\"g*j�C���Td��m�P�,WS��Ͼ 7��\n])R���� �Ng��*ՄUV1I*eT��s96�{6i����|�Ӭ(\n (�P����(��pS5Uo��5�A�#��\0���\0-��\\KX�n�T�T�L���Jg4�7i���S�k��]0��gֱM�'d��:��\\��!,�T(��|9��:����y�IӱӬg[}G���;�T�`S\nA�4���ͫl��+���SU&�T�8�o=�7P�C�����\\\r��ՆoT�{���Ր���SVa��v�˪e^�⮔t�Wl�-b��\r���6�vſš�!�qW�� ��`�+匳����XBxj96��3�U���T�L�*W���WR���(�*��`�3\\�l���	X�J��	M�Kw?Ǻ���D:���-KvK=��OD���rx���&��%s`�b�!�đM����R�z*]�\0�Ba6��B\0�`�2<9�zp:tʠ|�)�..����^�y~6���`��#������[�j+w����y)~��0ӷ������%I� ����A���󮉽���h�̽�;�;:K1��O�\r���Yǔ�c�X�&N����u�v����U��F��ȷtּ��Ŗ*�9bu\0�0-�':t���pЅ���Y�X3[7? �&���\rdE�s;m�w�-���e+pmdݶ4\n�Ƅ�O	���Q`o�ѯ!��u��0�ɹ4�^K���K�����R�̰༫CD����s��ps�u��G�5�]�p���w��c�g�m%!b<�\$��l�4�Wz ��#�� ���ƭs��/_[m\$4�ͳ�Y��(�)�F�*�Z�K���4�Ղ̠A���;\"�jdhT1���\"�G��.�\nF�}hߌ�a�K���P";break;case"vi":$g="Bp��&������ *�(J.��0Q,��Z���)v��@Tf�\n�pj�p�*�V���C`�]��rY<�#\$b\$L2��@%9���I�����Γ���4˅����d3\rF�q��t9N1�Q�E3ڡ�h�j[�J;���o��\n�(�Ub��da���I¾Ri��D�\0\0�A)�X�8@q:�g!�C�_#y�̸�6:����ڋ�.���K;�.���}F��ͼS0��6�������\\��v����N5��n5���x!��r7���C	��1#�����(�͍�&:����;�#\"\\!�%:8!K�H�+�ڜ0R�7���wC(\$F]���]�+��0��Ҏ9�jjP��e�Fd��c@��J*�#�ӊX�\n\npE�ɚ44�K\n�d����@3��&�!\0��3Z���0�9ʤ�H�(�\"�;�mh�#�CJV� %h�>%�*l����΢m)�	Rܘ���A����,���\r�E�*iH\$�@�70�C����:�@��LpѪ PH�� gd���X�n	~�/E,1�L�a�M�]�@���u*pM���	\n,�<Ď���S����'HAy�cd�G�t�����JpS��S���5�eC#��ur���܄��8�(�B�v	К&�B��c�\\<��h�6�� ���ʲ��\"\r1��6@j@@��cs��Gz8妌��x7cLQg��f9�C@6-\0P�7�C���0�6;c*]635�]����P����e�'A���A?��8��x�V�\r�hX\"�̎�\\j���U�Ae�72�\n]��H��@Η\n������r������E@��IG,P���tV��7�r�u%�\0x��8��C@�:�t���# ۶�O����w٩}��P�J@|ýH1B�vhx�>a\$�43Ű�XJX\r]��:H�ʗ\"h��j��c�X�p�ay@a��c�C*�!�^4��Cc���:���D\r\$t� 4o\n+g��\r����QHp:��b�Ѫu4����зAA@\$h����q�\"d��E�2���T�@pA��4@�\n\\�@� ��\rü))a�� 8�PÚ�@������uBI\n%r���|��B)��m�h��t�ACaL)f�]�AL�eU���IPfi��Vd�ANYE4հ.��U%I[�@\n!�`�@Rr�[�j��\0N�c�O���\rċ���~\$AR�SK�/�I.	\$H<�C�U��AH71v>��9�@�(3��_3臤1�t�:���6�2HP�D%��(�3�q����\$���Z��1�nNI��'����zc2�)��a���\nQ&dO��hb[�#�bS'���v�R/�-N|hcP�2p�Oa��Ě`0� �]I�tu�3KYh�åkM�DĔ�\\�d� �ؚz��ؕH�9�R�D!��U��P�BW�ux�:#��eM�ݻ�t,LjJSD*�@�A�rHU�b�S�dL�d�\$��<H�:�,���*�){:fR�\0��U��\$�(䜰���띟f�ɑ���l���D]��6QM�8gU���&|�U��Nj.T��ƒ�\nN\n�xPB܍�pĈ� s d��b5Z��9TXXIb�k���Q�\n��h-+�y���JS�Ң�<l�> LF��\0";break;case"zh":$g="�A*�s�\\�r����|%��:�\$\nr.���2�r/d�Ȼ[8� S�8�r�!T�\\�s���I4�b�r��ЀJs!J���:�2�r�ST⢔\n���h5\r��S�R�9Q��*�-Y(eȗB��+��΅�FZ�I9P�Yj^F�X9���P������2�s&֒E��~�����yc�~���#}K�r�s���k��|�i�-r�̀�)c(��C�ݦ#*�J!A�R�\n�k�P��/W�t��Z�U9��WJQ3�W�q�*�'Os%�dbʯC9��Mnr;N�P�)��Z�'1T���*�J;���)nY5������9XS#%����Ans�%��O-�30�*\\O�Ĺlt��0]��6r���^�-�8���\0J���|r��\nÑ)V���l���)2�@Q)n���K��+)3����'<�(M���]�Qsš� AR�L�I SA b�����8s���N]��\"�^��9zW%�s]�Aɱ��E�t�I�E�1j��IW)�i:R�9T���Q5L�	^��y#XM!,���5�x�B�m�@?���G\n��\$	К&�B��c��<��p�6�� �V�i==�)M8��0�D��W�XD�TA��K�`P�:Ijs����]�!tC1��E2��9��D�6I�!bt��X�1���HdzW��5�D�I\$�q�C�ey*Ƒ�VO��t��\$Ӧ�B��g�?�Y�j�n�b����Z�8O�A��\r��3��:����x�����6�#p�9�x�3��(�ȏ�\$9�#&(�������x�!�K'1fJ��a\\A�Łpr\$)�F��~B�%THa�/��ƕ�!�I��r�C\\Q.�E�����p����	+K^�&i0QN���k\"NVP_B�._g�8{�\0�\$\n'�Y�	PCAG!�%��hM���ØG\nT�,8�u&Ps��^�E� %�I���SA�.h \\�9�\0�l}���z9�!��Z#�\\���-i4P���@ aL)`@I�\$}\$����쳖���5����-�+n&��Ro�h�¸Z���#�Q���O*�@��ئC�O	�oL��\$�G�\\Zڊ-\0s��h�,<�z-GH�E\\(�!�1d�U��\"D8�(\"E~�\n:������\n�T��\$x]�H4��x�\$�@5�~!�0T\n|��~��XS\n!0��_	s'e)~6�Nq�w������ɛ��m�ٮ,���0s�M��\$^�G������/Ҁ��0ƈ��/DxCc���4�!����r�f/���4¸���&OE��wn�]�dB�F��-���<_Cl������I�X���A(.W��*\n���Qf:�4��@�T�n�� Fܾ��&/�a���\\�*/؊�^��4�%*���p� e�(d��;����� ��q�#ҁB#J_',��B��S0�j�����h��R����*h��5���\"�";break;case"zh-tw":$g="�^��%ӕ\\�r�����|%��:�\$\ns�.e�UȸE9PK72�(�P�h)ʅ@�:i	%��c�Je �R)ܫ{��	Nd T�P���\\��Õ8�C��f4����aS@/%����N����Nd�%гC��ɗB�Q+����B�_MK,�\$���u��ow�f��T9�WK��ʏW����2mizX:P	�*��_/�g*eSLK�ۈ��ι^9�H�\r���7��Zz>�����0)ȿN�\n�r!U=R�\n����^���J��T�O�](��I��^ܫ�]E�J4\$yhr��2^?[���eC�r��^[#�k�֑g1'��)�T'9jB)#�,�%')n䪪�hV���d�=Oa�@�IBO���s�¦K���J��12A\$�&�8mQd���lY�r�%�\0J�ԀD&��H�i�8�)^r�*��\\gA2�@�1D���v���i`\\��>��-�1�IAC�er2�:�@���ĶH�PH�� gR��i N(k��]�g1Gʇ9{I�q\$���Rz���q���|@��_s�ZH\$kW�α|C9T��.�'�%���!�C�ItW\\�B�J(d\r�i�e��G�ʲ�\$	К&�B��c�<��p�6�� �c�\$���(�L@��(@s��J��ʕ���5C�DB6����\r���˕I6Q0D��]̱�^K��8���t���R2.�#r	�@��4��Dw��t�\n�|F\$9t%4ND'�VC�]��2�c��7���W���F��{)�Q}n�0<TYo�C\0!\0�9�0z\r��8a�^��\\0��h�7��\\7�C8^2��x�L\r۶��JP}�d�)bJ��x�dır��A\\I���AФ)�Fۖ��o')�A�Qx�B�D�iI\r�XX��9���jT�܄H8���3�D֒#3c�|[�Dؘ��/e(���8���_?�Z&P@@Pcp%��!`�)D15�ŸT��2&�Q��J���/��1@����HJ)2����`x�`s�q�(�X5F���/G2�(b9l�1*#���\\Űr��o	��QL��0��0 ��5�\0��\"���9D��?��B^LI�=F�WT�.)EBr!�Z�	c�9��E\nJm0��xNc0r��u��OJ��J}��\0����,DAC�K�Ě\"G3�Q��N�#,xS\n���TP9���M�4�^\r�����)%�e&B����A���4�0T\n�9��DXS\n!0��Fs�BN�X5U~K�Q��W8���N��]B�Қs���z��-F	�!A\$�&���Qu\"gА�1B���~��`� <!� �r�I�9�O��]#ґ�:����NI���*0�P��h88��.����	���6\"��e�X_��(.U�*BU\0P����jrZ	�� L:m8���!_��^����/J���Y�+\0������F#��)�\$@��&�5���FP��bG@�bb�^�Ꞻ-2oQD���S�9�Z�<S@ɗ��g\$=\\���#�|";break;}$yg=array();foreach(explode("\n",lzw_decompress($g))as$X)$yg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$yg;}if(!$yg){$yg=get_translations($ba);$_SESSION["translations"]=$yg;}if(extension_loaded('pdo')){class
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
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Xc.$Fb)."' title='".lang(89)."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(43).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Ic[$y]=$X["fun"];next($K);}}$Dd=array();if($_GET["modify"]){foreach($J
as$I){foreach($I
as$y=>$X)$Dd[$y]=max($Dd[$y],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".lang(90):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($J,$Dc)as$ae=>$I){$Hg=unique_array($J[$ae],$w);if(!$Hg){$Hg=array();foreach($J[$ae]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Hg[$y]=$X;}}$Ig="";foreach($Hg
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Ig.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X===false?"f":$X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$Jc&&$K?"":"<td>".checkbox("check[]",substr($Ig,1),in_array(substr($Ig,1),(array)$_POST["check"])).($pd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ig)."' class='edit' title='".lang(91)."'>".lang(91)."</a>"));foreach($I
as$y=>$X){if(isset($be[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($Wb[$y])||$Wb[$y]!=""))$Wb[$y]=(is_mail($X)?$be[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Ig;if(!$_&&$X!==null){foreach((array)$Dc[$y]as$Cc){if(count($Dc[$y])==1||end($Cc["source"])==$y){$_="";foreach($Cc["source"]as$s=>$Mf)$_.=where_link($s,$Cc["target"][$s],$J[$ae][$Mf]);$_=($Cc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Cc["db"]),ME):ME).'select='.urlencode($Cc["table"]).$_;if($Cc["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Cc["ns"]),$_);if(count($Cc["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Hg))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Hg
as$sd=>$W)$_.=where_link($s++,$sd,$W);}$X=select_value($X,$_,$o,$jg);$t=h("val[$Ig][".bracket_escape($y)."]");$Y=$_POST["val"][$Ig][bracket_escape($y)];$Sb=!is_array($I[$y])&&is_utf8($X)&&$J[$ae][$y]==$I[$y]&&!$Ic[$y];$ig=preg_match('~text|lob~',$o["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$Sb)||$Y!==null){$Nc=h($Y!==null?$Y:$I[$y]);echo">".($ig?"<textarea name='$t' cols='30' rows='".(substr_count($I[$y],"\n")+1)."'>$Nc</textarea>":"<input name='$t' value='$Nc' size='$Dd[$y]'>");}else{$Jd=strpos($X,"<i>…</i>");echo" data-text='".($Jd?2:($ig?1:0))."'".($Sb?"":" data-warning='".h(lang(92))."'").">$X</td>";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$J[$ae]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($J||$D){$fc=true;if($_GET["page"]!="last"){if($z==""||(count($J)<$z&&($J||!$D)))$Fc=($D?$D*$z:0)+count($J);elseif($x!="sql"||!$pd){$Fc=($pd?false:found_rows($R,$Z));if($Fc<max(1e4,2*($D+1)*$z))$Fc=reset(slow_query(count_rows($a,$Z,$pd,$Jc)));else$fc=false;}}$Ce=($z!=""&&($Fc===false||$Fc>$z||$D));if($Ce){echo(($Fc===false?count($J)+1:$Fc-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.lang(93).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(94)."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($J||$D){if($Ce){$Qd=($Fc===false?$D+(count($J)>=$z?2:1):floor(($Fc-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(95)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(95)."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" …":"");for($s=max(1,$D-4);$s<min($Qd,$D+5);$s++)echo
pagination($s,$D);if($Qd>0){echo($D+5<$Qd?" …":""),($fc&&$Fc!==false?pagination($Qd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Qd'>".lang(96)."</a>");}}else{echo"<legend>".lang(95)."</legend>",pagination(0,$D).($D>1?" …":""),($D?pagination($D,$D):""),($Qd>$D?pagination($D+1,$D).($Qd>$D+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(97)."</legend>";$Kb=($fc?"":"~ ").$Fc;echo
checkbox("all",1,0,($Fc!==false?($fc?"":"~ ").lang(98,$Fc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Kb' : checked); selectCount('selected2', this.checked || !checked ? '$Kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(88),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(84).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(99),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(100),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Ec=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Ec['sql']);break;}}if($Ec){print_fieldset("export",lang(101)." <span id='selected2'></span>");$_e=$b->dumpOutput();echo($_e?html_select("output",$_e,$ta["output"])." ":""),html_select("format",$Ec,$ta["format"])," <input type='submit' name='export' value='".lang(101)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Wb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(102)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(102)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$ug'>\n","</form>\n",(!$Jc&&$K?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($Q,$t,$B)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$G=$h->query("SELECT $t, $B FROM ".table($Q)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$B LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($I=$G->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($Q)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($I[0]))."'>".h($I[1])."</a><br>\n";if($I)echo"...\n";}exit;}else{page_header(lang(63),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(103).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(43)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(104),'<td>'.lang(105),"</thead>\n";foreach(table_status()as$Q=>$I){$B=$b->tableName($I);if(isset($I["Engine"])&&$B!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$Q,in_array($Q,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($Q)."'>$B</a>";$X=format_number($I["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($Q)."'>".($I["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();