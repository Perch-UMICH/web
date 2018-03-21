@extends('layouts.app')
@section('title', 'Lab')

@section('header')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lab Creation</div>
                    <div class="panel-body">
                        <form id="register_form" class="form-horizontal" method="POST" action="{{ route('lab') }}">
                            {{ csrf_field() }}

                            <div id="register_page_0">
                                {{--lab name--}}
                                <div class="form-group{{ $errors->has('lab_name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="lab_name" type="text" class="form-control" name="lab_name"
                                               value="{{ old('lab_name') }}" required autofocus>

                                        @if ($errors->has('lab_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('lab_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                {{--department name--}}
                                <div class="form-group{{ $errors->has('department_name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Department</label>

                                    <div class="col-md-6">
                                        <input id="department_name" type="text" class="form-control" name="department_name"
                                               value="{{ old('department_name') }}" required autofocus>

                                        @if ($errors->has('department_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('department_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                {{--location--}}
                                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Location</label>

                                    <div class="col-md-6">
                                        <input id="location" type="text" class="form-control" name="location"
                                               placeholder="Building, Room number, etc." value="{{ old('location') }}">

                                        @if ($errors->has('location'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="register_page_1">
                                {{--<div class="form-group">--}}
                                    {{--<label for="skills" class="col-md-4 control-label">Selected Skills</label>--}}
                                    {{--<input id="skills" name="skills" type="hidden" class="form-control" value="[]">--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<ul class="well" id="selectedList"></ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="col-md-8 col-md-offset-2">--}}
                                        {{--<input id="searchBox" type="search" class="form-control"--}}
                                               {{--autocomplete="off" placeholder="Search for research areas">--}}
                                        {{--<p></p>--}}
                                        {{--<ul id="resultsList">--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <h4 id="question">What field of research is most associated with you lab?</h4>
                                <div class="form-group{{ $errors->has('research_areas') ? ' has-error' : '' }}">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <input id="research_areas" type="text" class="form-control" name="research_areas"
                                               value="{{ old('research_areas') }}" required autofocus>

                                        @if ($errors->has('research_areas'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('research_areas') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="register_page_2">
                                <h4 id="question">Give a short description of your lab's focus and goals.</h4>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="5" id="description" name="description" maxlength="400">{{ old('description') }}</textarea>
                                        <p class="pull-right" id="count_message"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-1 col-md-offset-1">
                                    <div id="register_prev_btn" class="btn btn-primary">Previous</div>
                                </div>
                                <div class="col-md-1 col-md-offset-7">
                                    <div id="register_next_btn" class="btn btn-primary">Next</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" id="register_submit_btn" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('js/autosize.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/fts_fuzzy_match.js') }}"></script>
    <script>
        // registration form controls
        var page = 0;
        var max_page = 3;
        $( document ).ready(function() {
            var next = $('#register_next_btn');
            var prev = $('#register_prev_btn');
            var submit_btn = $('#register_submit_btn');
            var title = $('#titleblock');

            for (var i = 1; i < max_page; ++i) {
                $('#register_page_' + i).hide();
            }

            submit_btn.hide();
            prev.hide();
            title.hide();

            // Next button
            next.click( next_page );

            // Prev button
            prev.click( prev_page );
        });

        $('#register_submit_btn').click(function(event) {
            if ($('#prof').prop('checked')) {
                event.preventDefault();
                $('#register_page_1').remove();
                $('#register_page_2').remove();
                $('#register_form').submit();
            }
        });

        next_page = function () {
            $('#register_prev_btn').show();

            var to_close = '#register_page_' + page;
            var to_open = '#register_page_' + (page + 1);
            $(to_close).slideUp();
            ++page;

            if (page === max_page - 1) {
                $('#register_next_btn').hide();
                $('#register_submit_btn').show();
            }
            $(to_open).slideDown();

        };

        prev_page = function () {
            if (page === max_page - 1) {
                $('#register_submit_btn').hide();

            }
            $('#register_next_btn').show();

            var to_close = '#register_page_' + page;
            var to_open = '#register_page_' + (page - 1);
            $(to_close).slideUp();
            --page;

            if (page === 0) {
                $('#register_prev_btn').hide();
                $('#register_submit_btn').hide();

            }
            $(to_open).slideDown();
        };

        // bio character counter
        var text_max = 400;
        var text_length = $('#bio').val().length;
        var text_remaining = text_max - text_length;

        $('#count_message').html(text_max + ' characters remaining');
        $('#bio').keyup(function() {
            text_length = $('#bio').val().length;
            text_remaining = text_max - text_length;
            if (text_remaining > 1) {
                $('#count_message').html(text_remaining + ' characters remaining');
            } else {
                $('#count_message').html(text_remaining + ' character remaining');
            }
        });

        // listener for skills
        var selected = [];

        // install listeners for select and add buttons after displaying search result
        onDisplayResults = function() {
            var selectButtons = $('.select');
            for (var i = 0; i < selectButtons.length; i++) {
                var button = $(selectButtons.get(i));
                this.selectListener(button);
            }

            var addButtons = $('.add');
            for (i = 0; i < addButtons.length; i++) {
                button = $(addButtons.get(i));
                this.addListener(button);
            }
        };

        // install listener for remove button after updating selectedList
        onUpdateSelected = function() {
            var removeButtons = $('.remove');
            for (var i = 0; i < removeButtons.length; i++) {
                var button = $(removeButtons.get(i));
                this.removeListener(button);
            }
        };

        // when user clicks on a select button
        selectListener = function(sel) {
            sel.click(function() {
                // find skill id
                var skillid;
                for (var id in dataset) {
                    if (dataset[id] === this.value) {
                        skillid = id;
                        break;
                    }
                }
                // add to selected and remove from search dataset
                selected.push(skillid);
                var remove = datasetArr.indexOf(this.value);
                datasetArr.splice(remove, 1);

                onPatternChange();
                updateSelected();
            });
        };

        // when user clicks on an add button
        addListener = function(sel) {
            sel.click(function() {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('skills') }}",
                    data: {name: this.value},
                    method: "POST",
                    success: function(data) {
                        var json = parse_json(data);
                        if(json.success) {
                            // update dataset and selected
                            dataset[json.id] = json.name;
                            selected.push(json.id);

                            onPatternChange();
                            updateSelected();
                        } else {
                            // Update failed
                            console.log(json.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Error
                        console.log(error);
                    }
                });
            });
        };

        parse_json = function (json) {
            try {
                var data = $.parseJSON(json);
            } catch (err) {
                throw "JSON parse error: " + json;
            }

            return data;
        };

        // when user clicks on a remove button
        removeListener = function(sel) {
            sel.click(function() {
                // remove from selected, add back to search dataset
                var remove = selected.indexOf(this.value);
                selected.splice(remove, 1);
                datasetArr.push(dataset[this.value]);

                onPatternChange();
                updateSelected();
            });
        };

        // Update display after user clicks on select button
        updateSelected = function() {
            // update hidden input value
            $('#skills').val(JSON.stringify(selected));

            var selectedList = document.getElementById('selectedList');
            var newResultsList = selectedList.cloneNode(false);

            for (var i = 0; i < selected.length; i++) {
                var li = document.createElement('li');
                li.innerHTML = '<button type="button" class="btn btn-xs btn-danger remove" value="' +
                    selected[i] + '">Remove</button> ' +
                    dataset[selected[i]];
                newResultsList.appendChild(li);
            }

            selectedList.parentNode.replaceChild(newResultsList, selectedList);
            selectedList = newResultsList;

            onUpdateSelected();
        };

        // skills fuzzy search
        var input;
        var matchFn = fuzzy_match;
        var resultsList = null;
        var datasetArr;
        var dataset;

        // populate datasetArr
        $.getJSON('{{ url('Resfields') }}', function(data) {
            dataset = data;
            // turn json into array
            datasetArr = Object.values(dataset);//$.map(data, function(skill) { return skill });
        });

        var asyncMatcher = null;

        onload = function() {
            // Initialize document element references
            input = document.getElementById('searchBox');
            input.oninput = onPatternChange;
            input.onpropertychange = input.oninput;

            resultsTime = document.getElementById('resultsTime');
            resultsList = document.getElementById('resultsList');
        };

        displayResults = function(results) {
            var newResultsList = resultsList.cloneNode(false);

            // Because adding too many elements is catastrophically slow because HTML is slow
            var max_entries = 500;

            // Create HTML elements for results
            for (index = 0; index < results.length && index < max_entries; ++index) {
                var li = document.createElement('li');
                li.innerHTML = "<button type='button' class='btn btn-xs btn-primary select' value='" +
                    results[index].replace(/<\/?[^>]+(>|$)/g, "") + "''>Select</button>" +
                    '<i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>' +
                    results[index];
                newResultsList.appendChild(li);
            }

            // add input to result
            var temp = Object.values(dataset);
            for (var i = 0; i < temp.length; i++) { temp[i] = temp[i].toUpperCase(); }
            if (temp.indexOf(input.value.toUpperCase()) === -1) {
                li = document.createElement('li');
                li.innerHTML = '<button type="button" class="btn btn-xs btn-success add" value="' +
                    input.value + '">Add</button>' +
                    '<i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>' +
                    input.value;
                newResultsList.appendChild(li);
            }

            // Replace the old results from the DOM.
            resultsList.parentNode.replaceChild(newResultsList, resultsList);
            resultsList = newResultsList;

            onDisplayResults();
        };

        onPatternChange = function() {

            // Clear existing async match if it exists
            if (asyncMatcher !== null) {
                asyncMatcher.cancel();
                asyncMatcher = null;
            }

            var pattern = input.value;

            // Data not yet loaded
            if (datasetArr === null)
                return;

            if (resultsList !== null)
            {
                // Clear the list
                var emptyList = resultsList.cloneNode(false);
                resultsList.parentNode.replaceChild(emptyList, resultsList);
                resultsList = emptyList;
            }

            // Early out on empty pattern (such as startup) because JS is slow
            if (pattern.length === 0)
                return;

            asyncMatcher = new fts_fuzzy_match_async(matchFn, pattern, datasetArr, function(results) {
                // Scored function requires sorting
                if (matchFn === fuzzy_match) {
                    results = results.sort(function(a,b) { return b[1] - a[1]; })
                        .map(function(v) { return v[2]; });
                }

                displayResults(results);

                asyncMatcher = null;
            });
            asyncMatcher.start();
        };
    </script>

@endsection