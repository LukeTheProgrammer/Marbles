{!! Form::label('child_id', 'Child', []) !!}

{!! Form::select(
        'child_id', 
        $child_options,
        $selected_child,
        [
            'class' => 'form-control',
            'placeholder' => 'Select Child',
            'required' => 'required',
        ]
    ) 
!!}

<br><br>

{!! Form::label('marble_id', 'Marble', []) !!}

{!! Form::select(
        'marble_id', 
        $marble_options,
        $selected_marble,
        [
            'class' => 'form-control',
            'placeholder' => 'Select Marble',
            'required' => 'required',
        ]
    ) 
!!}

<br><br>

