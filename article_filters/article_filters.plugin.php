<?php

class article_filters extends orbiter_plugin {

	function article_filters() {

		// Hook in right before content object is passed to template for rendering
		orbiter::add_filter( 'render_article_html_args', array( $this, 'filters' ), 5 );

	}

	function filters( $args, $article ) {

		$articles = orbiter::instance()->index();
		$request_uri = dirname( $article['uri'] );

		$children = array();
		$blog_posts = array();

		foreach ( $articles as $article )
			if ( strstr( $article['uri'], $request_uri ) && $article['slug'] !== 'index' )
				$children[] = $article;

		foreach ( $object['articles'] as $article )
			if ( strstr( $article['uri'], 'blog/' ) && ! empty( $article['slug'] ) )
				$blog_posts[] = $article;

		if ( ! empty( $children ) )
			$args[ 'children' ] = $children;

		if ( ! empty( $blog_posts ) )
			$args['blog_posts'] = $blog_posts;

		return $args;

	}

}
