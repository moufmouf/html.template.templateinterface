<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\Template\BaseTemplate;

use Mouf\Html\HtmlElement\HtmlElementInterface;
use Mouf\Html\Template\TemplateInterface;
use Mouf\Html\Utils\WebLibraryManager\WebLibraryManager;
use Mouf\Html\Renderer\ChainableRendererInterface;
use Mouf\Html\Renderer\CanSetTemplateRendererInterface;

/**
 * Base class that can be used by any Splash template.
 * A template only needs to implement the TemplateInterface interface, but this class provides
 * sensible default behaviours for most methods.
 * Classes extending the BaseTemplate only need to implement the "draw" method.
 * 
 */
abstract class BaseTemplate implements TemplateInterface {

	/**
	 * The HTML elements that will be displayed on the center of the screen.
	 *
	 * @var HtmlElementInterface
	 */
	protected $content;

	/**
	 * The title of the HTML page
	 * 
	 * @var string
	 */
	private $title;
	
	/**
	 * The weblibrarymanager is in charge of handing JS files.
	 * 
	 * @var WebLibraryManagerInterface
	 */
	private $webLibraryManager;
	
	/**
	 * The renderer used to render various items (used to overload default package behaviour)
	 * 
	 * @var ChainableRendererInterface
	 */
	private $templateRenderer;
	
	/**
	 * The default renderer. The template will automatically add the $templateRenderer in the 
	 * $defaultRenderer
	 *
	 * @var CanSetTemplateRendererInterface
	 */
	private $defaultRenderer;

	/**
	 * Default constructor
	 */
	public function __construct() {
		$this->content = array();
	}
	
	/**
	 * The main content of the template.
	 *
	 * @Property
	 * @param HtmlElementInterface $content
	 */
	public function setContent(HtmlElementInterface $content) {
		$this->content = $content;
	}
	
	/**
	 * Sets the title for the HTML page
	 * 
	 * @Property
	 * @param string $title
	 * @return BaseTemplate
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Gets the title for the HTML page
	 * 
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the web library manager for this template.
	 *
	 * @Property
	 * @param WebLibraryManager $webLibraryManager
	 * @return BaseTemplate
	 */
	public function setWebLibraryManager(WebLibraryManager $webLibraryManager) {
		$this->webLibraryManager = $webLibraryManager;
		return $this;
	}
	
	/**
	 * Returns the WebLibraryManager object that can be used to add JS/CSS files to this template.
	 * 
	 * @return WebLibraryManager
	 */
	public function getWebLibraryManager() {
		return $this->webLibraryManager;
	}

	/**
	 * The renderer used to render various items (used to overload default package behaviour)
	 *  
	 * @return ChainableRendererInterface
	 */
	public function getTemplateRenderer() {
		return $this->templateRenderer;
	}
	
	/**
	 * The renderer used to render various items (used to overload default package behaviour)
	 * 
	 * @param ChainableRendererInterface $templateRenderer
	 * @return self
	 */
	public function setTemplateRenderer(ChainableRendererInterface $templateRenderer) {
		$this->templateRenderer = $templateRenderer;
		return $this;
	}

	/**
	 * The default renderer. The template will automatically add the $templateRenderer in the 
	 * $defaultRenderer
	 * 
	 * @return CanSetTemplateRendererInterface
	 */
	public function getDefaultRenderer() {
		return $this->defaultRenderer;
	}
	
	/**
	 * The default renderer. The template will automatically add the $templateRenderer in the 
	 * $defaultRenderer
	 * 
	 * @param CanSetTemplateRendererInterface $defaultRenderer
	 */
	public function setDefaultRenderer(CanSetTemplateRendererInterface $defaultRenderer) {
		$this->defaultRenderer = $defaultRenderer;
		return $this;
	}
}
?>