<x-layout>
    <h1>
        <span>会計ソフト</span>
        <a href="{{ route('details.create') }}">[入金へ追記]</a>
        <a href="{{ route('credits.create2') }}">[支払へ追記]</a>
    </h1>

    {{-- 借方 --}}
    <div class="details">
        <div class="sum">
            <h2>借方合計金額</h2>
            <?php $data = $details->sum('rmb'); ?>
          合計：  <?php echo $data; ?>
        </div>
        <table border="2" class="table1">
            <thead>
                <tr>
                    <th>記録日</th>
                    <th>入金項目</th>
                    <th>金額（RMB）</th>
                    <th>金額（USD）</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    @if ($loop->iteration % 1 !== 0)
                        <tr>
                    @endif
                    <td>{{ $detail->datetime }}</td>
                    <td>{{ $detail->customer }}</td>
                    <td>{{ $detail->rmb }}</td>
                    <td>{{ $detail->usd }}</td>
                    @if ($loop->iteration % 1 === 0)
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 貸方 --}}
    <div class="credits">
        <div class="sum">
            <h2>貸方合計金額</h2>
            <?php $data_credit = $credits->sum('rmb_credit'); ?>
           合計： <?php echo $data_credit; ?>
        </div>
        <table border="2" class="table2">
            <thead>
                <tr>
                    <th>記録日</th>
                    <th>支払項目</th>
                    <th>金額（RMB）</th>
                    <th>金額（USD）</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($credits as $credit)
                    @if ($loop->iteration % 1 !== 0)
                        <tr>
                    @endif
                    <td>{{ $credit->datetime_credit }}</td>
                    <td>{{ $credit->creditor }}</td>
                    <td>{{ $credit->rmb_credit }}</td>
                    <td>{{ $credit->usd_credit }}</td>
                    @if ($loop->iteration % 1 === 0)
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
