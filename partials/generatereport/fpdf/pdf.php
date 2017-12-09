<?php

require 'fpdf.php' ;

class PDF extends FPDF
{
	var $B=0;
	var $I=0;
	var $U=0;
	var $HREF='';
	var $ALIGN='';
	var $widths;
	var $aligns;
	
	function Title($title)
	{
		$this->SetFont('Arial','B',12);
		$this->Cell(80);
		$this->Cell(30,10,$title,0,0,'C');
		$this->Ln(7);
	}
	
	function SideTitle($title)
	{
		$this->SetFont('Arial','B',12);
		$this->Cell(30,10,$title,0,0,'L');
		$this->Ln(7);
	}

	function LoadData($file)
	{
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}

	function BasicTable($header)
	{		
		foreach($header as $col)
		{
			$this->WriteHTML('<b align="center">');
			$this->Cell(40,7,$col,1,0,'C');
			$this->WriteHTML('</b>');
		}
		$this->Ln();
	}

	function ImprovedTable($header, $data)
	{
		$w = array(45, 35, 40, 45);
		$this->SetX(20);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR');
			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
			$this->Ln();
		}
		$this->Cell(array_sum($w),0,'','T');
	}

	function FancyTable($header, $data)
	{
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		$w = array(40, 35, 40, 45);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		$this->Cell(array_sum($w),0,'','T');
	}

	function WriteHTML($html)
	{
		$html=str_replace("\n",' ',$html);
		$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
		foreach($a as $i=>$e)
		{
			if($i%2==0)
			{
				if($this->HREF)
					$this->PutLink($this->HREF,$e);
				elseif($this->ALIGN=='center')
					$this->Cell(0,5,$e,0,1,'C');
				else
					$this->Write(5,$e);
			}
			else
			{
				if($e[0]=='/')
					$this->CloseTag(strtoupper(substr($e,1)));
				else
				{
					$a2=explode(' ',$e);
					$tag=strtoupper(array_shift($a2));
					$prop=array();
					foreach($a2 as $v)
					{
						if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
							$prop[strtoupper($a3[1])]=$a3[2];
					}
					$this->OpenTag($tag,$prop);
				}
			}
		}
	}

	function OpenTag($tag,$prop)
	{
		if($tag=='B' || $tag=='I' || $tag=='U')
			$this->SetStyle($tag,true);
		if($tag=='A')
			$this->HREF=$prop['HREF'];
		if($tag=='BR')
			$this->Ln(5);
		if($tag=='P')
			$this->ALIGN=$prop['ALIGN'];
		if($tag=='HR')
		{
			if( !empty($prop['WIDTH']) )
				$Width = $prop['WIDTH'];
			else
				$Width = $this->w - $this->lMargin-$this->rMargin;
			$this->Ln(2);
			$x = $this->GetX();
			$y = $this->GetY();
			$this->SetLineWidth(0.4);
			$this->Line($x,$y,$x+$Width,$y);
			$this->SetLineWidth(0.2);
			$this->Ln(2);
		}
	}

	function CloseTag($tag)
	{
		if($tag=='B' || $tag=='I' || $tag=='U')
			$this->SetStyle($tag,false);
		if($tag=='A')
			$this->HREF='';
		if($tag=='P')
			$this->ALIGN='';
	}

	function SetStyle($tag,$enable)
	{
		$this->$tag+=($enable ? 1 : -1);
		$style='';
		foreach(array('B','I','U') as $s)
			if($this->$s>0)
				$style.=$s;
		$this->SetFont('',$style);
	}

	function PutLink($URL,$txt)
	{
		$this->SetTextColor(0,0,255);
		$this->SetStyle('U',true);
		$this->Write(5,$txt,$URL);
		$this->SetStyle('U',false);
		$this->SetTextColor(0);
	}
	
	function SetWidths($w)
	{
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		$this->aligns=$a;
	}

	function Row($data)
	{
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
		$this->CheckPageBreak($h);
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			$x=$this->GetX();
			$y=$this->GetY();
			$this->Rect($x,$y,$w,$h);
			$this->MultiCell($w,5,$data[$i],0,$a);
			$this->SetXY($x+$w,$y);
		}
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;	
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
}
?>
