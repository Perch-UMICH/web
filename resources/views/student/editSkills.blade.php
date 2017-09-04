@extends('layouts.app')
@section('title', 'Profile')

@section('header')
    <link href="{{ asset('css/perch.css') }}" rel="stylesheet">
@endsection

@section('status')
    @if (session('status'))
        <div class="container" id="status">
            <p> {{ session('status') }} </p>
        </div>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">

                <!-- user info -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- profile picture -->
                        <img src="{{ url('/photo/' . $username) }}" alt="Profile Picture" class="img-responsive"
                             onclick="updateProfilePic()"
                             @if($student->user_id == auth()->id())
                                data-toggle="tooltip" title="Click to change profile picture"
                             @endif
                        >
                        <form method="post" action="{{ url('/photo') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="profile_picture" id="profile_upload" class="invisible"
                                   onchange="this.form.submit()"/>
                        </form>

                        <div id="basic_info">
                            <h1 id="profile_name">{{ $student->first_name }} {{ $student->last_name }}</h1>
                            <p>
                                <i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i> {{ $student->major }}
                            </p>
                            <form method="post" action="{{ url('/resume') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="resume" id="resume_upload" class="invisible"
                                       onchange="this.form.submit()"/>
                            </form>
                            @include('layouts.errors')
                        </div>
                        <hr>
                        <div id="academics">
                            <h2 id="academics_title">Academics</h2>
                            <p><i class="fa fa-university fa-fw" aria-hidden="true"></i>
                                Class Standing: {{ $student->year }} </p>
                            @if ($student->gpa)
                                <p><i class="fa fa-balance-scale fa-fw" aria-hidden="true"></i>
                                    GPA:  {{ number_format($student->gpa, 2) }} </p>
                            @endif
                        </div>
                        <hr>
                        <div>
                            <h2 id="links_title">Links</h2>
                            <p>
                                <i class="fa fa-linkedin-square fa-fw" aria-hidden="true"></i>
                                Linkedin:
                                @if ($student->linkedin_user)
                                    <a class="btn btn-xs btn-warning"
                                       data-toggle="tooltip" title="{{ $student->linkedin_user }}" disabled="disabled">External link</a>
                                @else
                                    <button type="button" class="btn btn-xs btn-warning" disabled="disabled">External link</button>
                                @endif
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <form action="/studentskills/{{ $username }}" method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
            <!-- right column -->
            <div class="col-md-9">
                <!-- bio -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bio
                    </div>
                    <div class="panel-body">
                        @if ($student->bio)
                            <p>{{ $student->bio }}</p>
                        @else
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget lacinia orci. Vivamus luctus ante
                                quis tortor porta, sit amet facilisis eros pretium. Donec vehicula venenatis nulla, nec malesuada neque.
                                Duis mollis ligula turpis, vel aliquet nibh dapibus sit amet. Proin ultricies lobortis sem, eu lobortis
                                velit egestas et. Duis lobortis at orci nec venenatis. Vestibulum ultricies urna eu nisi vehicula, et
                                dapibus dolor laoreet.</p>
                        @endif

                    </div>
                </div>

                <!-- skills and interest -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Skills
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="skills" class="col-md-2 control-label">Selected Skills</label>
                            <input id="skills" name="skills" type="hidden" class="form-control" value="[]">
                            <div class="col-md-8">
                                <ul class="well" id="selectedList"></ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <hr>
                            <input id="searchBox" type="search" class="form-control"
                                   autocomplete="off" placeholder="Search for skills">
                            <p></p>
                            <ul id="resultsList">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right btn-toolbar">
                <input type="submit" class="btn btn-primary pull-right" value="Save Skills">
                <a href="{{url('/student/' . $username)}}" class="btn btn-danger pull-right">Cancel</a>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>

    @if($student->user_id == auth()->id())
    <script>
        function updateProfilePic(){
            document.getElementById("profile_upload").click();
        }
        function uploadResume(){
            document.getElementById("resume_upload").click();
        }
    </script>
    @endif

    <script type="text/javascript" src="{{ asset('js/fts_fuzzy_match.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $("#status").show().delay(3000).slideUp("slow");
            $("#profile_name").fitText();
            $('#academics_title').fitText(1.4);
            $('#links_title').fitText(1.4);
            $('.pull-right').onclick = function() {
                console.log('clicked');
            };
        });

        // listener for skills
        var selected = [];

        populateSelectedList = function() {
            // get existing skills
            $.getJSON('{{ url('studentskills/' . $username) }}', function(data) {
                selected = Object.keys(data);//$.map(data, function(skill) { return skill });
                // remove from datasetArr
                for (var i = 0; i < selected.length; i++) {
                    datasetArr.splice(datasetArr.indexOf(dataset[selected[i]]), 1);
                    datasetArr.splice(datasetArr.indexOf(dataset[selected[i]]), 1);
                }
                updateSelected();
            });
        };

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

        // populate datasetArr and selectedList
        $.getJSON('{{ url('skills') }}', function(data) {
            dataset = data;
            // turn json into array
            datasetArr = Object.values(dataset);//$.map(data, function(skill) { return skill });
            populateSelectedList();
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