@php
    /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif        
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#add_data" role="tab">Дополнительные данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="content_raw">Статья</label>
                                <textarea name="content_raw"
                                          id="content_raw"
                                          class="form-control"
                                          rows="20">{{ $item->content_raw ?? old('content_raw') }}
                                </textarea>           
                            </div>
                        </div>
                        <div class="tab-pane" id="add_data" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select name="category_id"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Выберете категорию"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif
                                            >
                                            {{ $categoryOption->title }}
                                        </option>    
                                    @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                                <input name="slug" value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control">       
                            </div>
                            <div class="form-group">
                                <label for="preview">Анонс</label>
                                <textarea name="preview"
                                          id="preview"
                                          class="form-control"
                                          rows="3">{{ $item->excerpt ?? old('excerpt') }}
                                </textarea>      
                            </div>
                            <div class="form-check">
                                <input name="is_published" 
                                       type="hidden"
                                       value="0"
                                >
                                <input name="is_published" 
                                       type="checkbox" 
                                       class="form-check-input" 
                                       value="1"
                                       @if($item->is_published)checked="checked"@endif
                                >
                                <label class="form-check-label" for="is_published">Опубликовано</label>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>