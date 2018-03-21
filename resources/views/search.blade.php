@extends('layouts.app')
@section('title', 'Search')

@section('header')
@endsection

@section('content')
@if (Auth::user()->hasRole('student'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <!--div class="panel-heading">Lab Dashboard</div-->

                    <div class="panel-body">
                        <h1>Labs</h1>
                        <form action="/search_lab" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" id="searchBar" class="form-control" name="q"
                                       placeholder="Search by tags">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <hr/>
                        <button type="button" class="btn btn-default btn-sm alert-danger">Filter
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <hr/>
                        <div class="row" id="labResults">
                            <!--
                                <div class="col-md-4"><div class="well well-md">
                                    <h3>Lab Name</h3>
                                    <h4><a href='/lab/id'>View</a></h4>
                                    <h4><a href='/lab/id/edit'>Edit</a></h4>
                                </div></div>
                             -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

@endif
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/fts_fuzzy_match.js') }}"></script>
    <script type="text/javascript">
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


        var matchFn = fuzzy_match;
        var resultsList = null;
        var currentDataSet = dataSets["ue4_filenames"];

        var asyncMatcher = null;

        onload = function() {
            // Initialize document element references
            patternField = document.getElementById('searchBar');
            patternField.oninput = onPatternChange;
            patternField.onpropertychange = patternField.oninput;
        };

        displayResults = function(results) {
            var newResultsList = resultsList.cloneNode(false);

            // Because adding too many elements is catastrophically slow because HTML is slow
            var max_entries = 500;

            // Create HTML elements for results
            for (index = 0; index < results.length && index < max_entries; ++index) {
                var li = document.createElement('li');
                li.innerHTML = results[index];
                newResultsList.appendChild(li);
            }

            // Replace the old results from the DOM.
            resultsList.parentNode.replaceChild(newResultsList, resultsList);
            resultsList = newResultsList;
        };

        onPatternChange = function() {

            // Clear existing async match if it exists
            if (asyncMatcher !== null) {
                asyncMatcher.cancel();
                asyncMatcher = null;
            }

            var pattern = patternField.value;

            // Data not yet loaded
            if (currentDataSet == null)
                return;

            if (resultsList !== null)
            {
                // Clear the list
                var emptyList = resultsList.cloneNode(false);
                resultsList.parentNode.replaceChild(emptyList, resultsList);
                resultsList = emptyList;
            }

            // Early out on empty pattern (such as startup) because JS is slow
            if (pattern.length == 0)
                return;

            var startTime = performance.now();

            asyncMatcher = new fts_fuzzy_match_async(matchFn, pattern, currentDataSet, function(results) {
                // Scored function requires sorting
                if (matchFn == fuzzy_match) {
                    results = results
                        .sort(function(a,b) { return b[1] - a[1]; })
                        .map(function(v) { return v[1] + " - " + v[2]; });
                }

                var endTime = performance.now();

                displayResults(results);

                asyncMatcher = null;
            });
            asyncMatcher.start();
        };



    </script>
@endsection

