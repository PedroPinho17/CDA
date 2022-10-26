<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Clube Desportivo Arrifanense')
<p>Clube Desportivo Arrifanense</p>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
