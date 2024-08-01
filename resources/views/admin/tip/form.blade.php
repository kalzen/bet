@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.tip.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.tip.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        
                        <div class="form-group">
                            <label class="font-weight-semibold">Name Team 1 <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="name_team_1" name="name_team_1" value="{{ old('name_team_1') ?: ($record->name_team_1 ?? '') }}">
                            @error('name_team_1')
                            <label id="name_team_1-error" class="validation-invalid-label" for="name_team_1">{{$message}}</label>
                            @enderror
                        </div>

                       
                        <div class="form-group">
                            <label class="font-weight-semibold">Logo team 1<span class="required"></span></label>
                            <input type="file" class="form-control-file" multiple data-key="logo_team_1" data-fouc>
                            @if(old('logo_team_1'))
                            <input class="form-control" type="hidden" name="logo_team_1" value="{{old('logo_team_1')}}" id="logo_team_1">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('logo_team_1')}}"/>
                            @elseif (isset($record) && $record->logo_team_1)
                            <input class="form-control" type="hidden" name="logo_team_1" value="{{$record->logo_team_1}}" id="logo_team_1">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->logo_team_1}}"/>
                            @else
                            <input class="form-control" type="hidden" name="logo_team_1" value="" id="logo_team_1">
                            
                            @endif
                            @error('logo_team_1')
                            <label id="image-error" class="validation-invalid-label" for="logo_team_1">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Name Team 2 <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="name_team_2" name="name_team_2" value="{{ old('name_team_2') ?: ($record->name_team_2 ?? '') }}">
                            @error('name_team_2')
                            <label id="name_team_2-error" class="validation-invalid-label" for="name_team_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Logo team 2<span class="required"></span></label>
                            <input type="file" class="form-control-file" multiple data-key="logo_team_2" data-fouc>
                            @if(old('logo_team_2'))
                            <input class="form-control" type="hidden" name="logo_team_2" value="{{old('logo_team_2')}}" id="logo_team_2">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('logo_team_2')}}"/>
                            @elseif (isset($record) && $record->logo_team_2)
                            <input class="form-control" type="hidden" name="logo_team_2" value="{{$record->logo_team_2}}" id="logo_team_2">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->logo_team_2}}"/>
                            @else
                            <input class="form-control" type="hidden" name="logo_team_2" value="" id="logo_team_2">
                            @endif
                            @error('logo_team_2')
                            <label id="image-error" class="validation-invalid-label" for="logo_team_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Score Team 1</label>
                            <input type="number" class="form-control" name="score_team_1" value="{{ old('score_team_1') ?: ($record->score_team_1 ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Score Team 2</label>
                            <input type="number" class="form-control" name="score_team_2" value="{{ old('score_team_2') ?: ($record->score_team_2 ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Home Bet</label>
                            <input type="text" class="form-control" name="home_bet" value="{{ old('home_bet') ?: ($record->home_bet ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Home Bet Rate</label>
                            <input type="text" class="form-control" name="home_bet_rate" value="{{ old('home_bet_rate') ?: ($record->home_bet_rate ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Draw Bet</label>
                            <input type="text" class="form-control" name="draw_bet" value="{{ old('draw_bet') ?: ($record->draw_bet ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Draw Bet Rate</label>
                            <input type="text" class="form-control" name="draw_bet_rate" value="{{ old('draw_bet_rate') ?: ($record->draw_bet_rate ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Guest Bet</label>
                            <input type="text" class="form-control" name="guest_bet" value="{{ old('guest_bet') ?: ($record->guest_bet ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Guest Bet Rate</label>
                            <input type="text" class="form-control" name="guest_bet_rate" value="{{ old('guest_bet_rate') ?: ($record->guest_bet_rate ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Recommend</label>
                            <input type="text" class="form-control" name="recommend" value="{{ old('recommend') ?: ($record->recommend ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Recommend Rate</label>
                            <input type="text" class="form-control" name="recommend_rate" value="{{ old('recommend_rate') ?: ($record->recommend_rate ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Date</label>
                            @isset($record)
                            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') ?: ($record->date ? $record->date : '') }}">
                            @else
                            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') ? : '' }}">
                            @endisset
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
				</div>
            </div>
            
        </div>
    </div>
</form>
@endsection
