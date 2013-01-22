<?php

class article_filters extends orbiter {

	function article_filters() {
		orbiter::add_filter( 'render_article_html', array( $this, 'filters' ), 5 );
	}

	function filters( $object, $request_uri ) {
		if ( empty( $request_uri ) )
			return $object;

		foreach ( $object['articles'] as $article )
			if ( strstr( $article['uri'], $request_uri ) && ! empty( $article['slug'] ) )
				$object['children'][] = $article;

		foreach ( $object['articles'] as $article )
			if ( strstr( $article['uri'], 'blog' ) && ! empty( $article['slug'] ) )
				$object['blog_posts'][] = $article;

		return $object;
	}

}
