<?php

class article_filters extends orbiter {

	function article_filters() {
		// Hook in right before content object is passed to template for rendering
		orbiter::add_filter( 'render_article_html', array( $this, 'filters' ), 5 );
	}

	function filters( $object, $request_uri ) {
		// We are on home page, no need to run
		if ( empty( $request_uri ) )
			return $object;

		// Add all child pages to children global
		foreach ( $object['articles'] as $article )
			if ( strstr( $article['uri'], $request_uri ) && ! empty( $article['slug'] ) )
				$object['children'][] = $article;

		// Add all blog posts to blog_posts global
		foreach ( $object['articles'] as $article )
			if ( strstr( $article['uri'], 'blog' ) && ! empty( $article['slug'] ) )
				$object['blog_posts'][] = $article;

		return $object;
	}

}
