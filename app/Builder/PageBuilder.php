<?php 

namespace App\Builder;
use App\Http\Controllers\PageController;
use App\Information;
use App\About;
use App\CategoryRoom;
use App\Description;
use App\Slide;
use App\CategoryFood;
use App\Review;
use App\Event;

class PageBuilder	
{
	private $page;

	public function __construct(PageController $page)
	{
		$this->page = $page;
	}

	public function setInfor()
	{
		$this->page->infor=Information::find(0);
		return $this;
		
	}
	public function getInfor()
	{
		return $this->page->infor;
	}


	public function setAbout()
	{
		$this->page->about=About::find(1);
		return $this;
	}
	public function getAbout()
	{
		return $this->page->about;
	}


	public function setDescription()
	{
		$this->page->description=Description::find(1);
		return $this;
	}
	public function getDescription()
	{
		return $this->page->description;
	}

	public function setSlide()
	{
		$this->page->slide=Slide::all();
		return $this;
	}
	public function getSlide()
	{
		return $this->page->slide;
	}


	public function setEvent()
	{
		$this->page->event=Event::all();
		return $this;
	}
	public function getEvent()
	{
		return $this->page->event;
	}

	public function setCategory()
	{
		$this->page->category=CategoryRoom::all();
		return $this;
	}
	public function getCategory()
	{
		return $this->page->category;
	}



	
}