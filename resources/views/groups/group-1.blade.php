<div class="container-fluid">
    <div class="row">
        {{-- 1 --}}
        <div class="col-sm-6">
            <label for="inputEmail4" class="form-label bg-light w-100 fw-bold">Creation Date :</label>
            <p>{{ $customerSapData['CreateDate'] }}</p>
        </div>

        {{-- 2 --}}
        <div class="col-sm-6">
            <label for="inputEmail4" class="form-label bg-light  w-100 fw-bold">Group :</label>
            <span>{{ $customerSapData['GroupName'] }}</span>
            <span id="COM">{{ $customerMySqlData['COM'] }}</span>
        </div>

        {{-- 3 --}}
        <div class="col-sm-6">
            <label for="inputPassword4" class="form-label bg-light  w-100 fw-bold"> {{ __('CardCode', [], 'ar') }}
            </label>
            <p>{{ $customerSapData['CardCode'] }} </p>
        </div>

        {{-- 4 --}}
        <div class="col-sm-6">
            <label for="inputPassword4" class="form-label bg-light  w-100 fw-bold"> {{ __('CardName', [], 'ar') }}
            </label>
            <p>{{ $customerSapData['CardName'] }} </p>
        </div>

        {{-- 5 --}}
        <div class="col-sm-6 {{ $errors->has('CustomerType') ? 'border border-danger' : '' }}">
            <label for="" class="form-label bg-light  w-100 fw-bold d-block"> {{ __('CustomerType', [], 'ar') }}
                @if ($customerSapData['PymntGroup'] == '- Cash Basic -')
                    <span class="text-danger">CASH BASIC </span>
                @else
                    <span class="text-danger">NOT CASH BASIC </span>
                @endif
            </label>

            @if (Auth::user()->isSuperUser == 1)
                @include('single.q-mark', ['r' => $r, 'fdname' => 'CustomerType'])
            @endif
            @php
                if (in_array('CustomerType', $allDDLColumn)):
                    echo '<div class="form-check
                    endif; form-check-inline">';
                    $allOptions = App\Models\ColumnOption::where('colName', 'CustomerType')->get();
                    foreach ($allOptions as $k1 => $val1):
                        $res = '';
                        if ($val1->colOption == old('CustomerType', $customerMySqlData->CustomerType)) {
                            $res = 'checked';
                        }
                        if ($customerSapData['PymntGroup'] !== '- Cash Basic -' && $val1->colOption == 'نقدى') {
                            $rss = 'disabled';
                        } elseif ($customerSapData['PymntGroup'] == '- Cash Basic -' && $val1->colOption !== 'نقدى') {
                            $rss = 'disabled';
                        } else {
                            $rss = '';
                        }
                        echo '<div>';
                        echo "<input class='form-check-inline m-2' type='radio' name='CustomerType' id='CustomerType' $res $rss value=\"$val1->colOption\" />";
                        echo "<label class=\"form-check-label\" for='CustomerType'>";
                        echo $val1->colOption;
                        echo '</label>';
                        echo '</div>';
                    endforeach;
                    echo '</div>';
                else:
                    echo "<input type='text' class='form-control' value=\"$customerMySqlData->CustomerType\"
                                        name='CustomerType'>";
                endif;
            @endphp
        </div>

        {{-- 6 --}}
        <div
            class="col-sm-6 {{ $errors->has('CustomerName') && old('CommercialRegister') == 'موجود' ? 'border border-danger' : '' }}">
            <label for="" class="form-input-label bg-light  w-100 fw-bold"> {{ __('CustomerName', [], 'ar') }}
            </label>
            @if (Auth::user()->isSuperUser == 1)
                @include('single.q-mark', ['r' => $r, 'fdname' => 'CustomerName'])
            @endif
            @php
                if (in_array('CustomerName', $allDDLColumn)):
                    echo '<div class="form-check form-check-inline">';
                    $allOptions = App\Models\ColumnOption::where('colName', 'CustomerName')->get();
                    foreach ($allOptions as $k1 => $val1):
                        $res = '';

                        if ($val1->colOption == old('CustomerName', $customerMySqlData->CustomerName)) {
                            $res = 'checked';
                        }
                        echo "<input class='form-check-inline m-2' type='radio' name='CustomerName' id='CustomerName' $res  value=\"$val1->colOption\" />";
                        echo "<label class='form-check-label' for='CustomerName'>";
                        echo $val1->colOption;
                        echo '</label>';
                    endforeach;
                    echo '</div>';
                else:
                    echo "<input type='text' class='form-control' value=\"" . old('CustomerName', $customerMySqlData->CustomerName) . "\" name='CustomerName'>";
                endif;
            @endphp
        </div>

        {{-- 7 --}}
        <div
            class="col-sm-12 sejel {{ $errors->has('OrgLegalStatue') && old('CommercialRegister') == 'موجود' ? 'border border-danger' : '' }} ">
            <label for="" class="form-input-label bg-light  w-100 fw-bold">
                {{ __('OrgLegalStatue', [], 'ar') }}
            </label>
            @if (Auth::user()->isSuperUser == 1)
                @include('single.q-mark', ['r' => $r, 'fdname' => 'OrgLegalStatue'])
            @endif
            @php
                if (in_array('OrgLegalStatue', $allDDLColumn)):
                    echo '<div class="form-check form-check-inline">';
                    $allOptions = App\Models\ColumnOption::where('colName', 'OrgLegalStatue')->get();
                    foreach ($allOptions as $k1 => $val1):
                        $res = '';
                        if ($val1->colOption == old('OrgLegalStatue', $customerMySqlData->OrgLegalStatue)) {
                            $res = 'checked';
                        }
                        echo '<div>';
                        echo "<input class='form-check-inline m-2' type='radio' name='OrgLegalStatue' id='OrgLegalStatue' $res  value=\"$val1->colOption\" />";
                        echo "<label class='form-check-label' for='OrgLegalStatue'>";
                        echo $val1->colOption;
                        echo '</label>';
                        echo '</div>';
                    endforeach;
                    echo '</div>';
                else:
                    echo "<input type='text' class='form-control' value=\"$customerMySqlData->OrgLegalStatue\"
                                        name='OrgLegalStatue'>";
                endif;
            @endphp
        </div>
    </div>
</div>
