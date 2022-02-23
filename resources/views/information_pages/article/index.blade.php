<div class="row article">
    <div class="col-12 col-md-6 col-lg-6 image">
        <div class="articleSlide">
            <div>

                @isset( $article->featured_image )
                  @include( 'templates.placeholders.simple_image_placeholders',
                    [
                      'imgvar' => $article->featured_image,
                      'imgtitle' => $article->title,
                      'imgclasses' => 'img-fluid',
                      'class' => '',
                      'width' => 800,
                      'height' => 600,
                      'text' => '+',
                      'use_vault_logo' => true,
                      'use_placehold_it' => true.
                    ]
                  )
                @endisset

                @forelse($article->displayArticles as $key => $art)

                  @isset( $art->featured_image )
                    @include( 'templates.placeholders.simple_image_placeholders',
                      [
                        'imgvar' => $art->featured_image,
                        'imgtitle' => $art->title,
                        'imgclasses' => 'img-fluid',
                        'class' => '',
                        'width' => 800,
                        'height' => 600,
                        'text' => '+',
                        'use_vault_logo' => true,
                        'use_placehold_it' => true,
                      ]
                    )
                  @endisset

                @empty
                @endforelse

            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 info">

      @isset( $article->title )
        <h3>{{$article->title}}</h3>
      @endisset

      @isset( $article->description )
        {!! $article->description !!}
      @endisset

    </div>

</div>
