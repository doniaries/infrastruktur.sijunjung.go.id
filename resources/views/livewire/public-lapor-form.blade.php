<div class="min-h-screen flex items-center justify-center dark:bg-dark">
    <div class="w-full max-w-3xl px-4 py-10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Form Laporan Infrastruktur</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Isi data dengan lengkap untuk mempercepat penanganan.</p>
        </div>
        <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-lg rounded-2xl border border-gray-200 dark:border-gray-700">
            <div class="p-6 sm:p-8">
                <form wire:submit.prevent="submit" class="space-y-6 w-full">
                    <div class="space-y-4 w-full">
                        {{ $this->form }}
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-2 sm:pt-4 justify-center">
                        <a href="{{ url('/') }}" class="px-6 py-3 text-center rounded-lg form-button form-button-back">Kembali</a>
                        <button type="submit" class="px-6 py-3 rounded-lg form-button form-button-submit glow-on-hover ripple">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var form = document.querySelector('form[wire\\:submit\\.prevent="submit"]');
  if (!form) return;
  var candidates = ['nomor_tiket','no_tiket','ticket_number','kode_tiket'];
  var input = null;
  for (var i = 0; i < candidates.length; i++) {
    var name = candidates[i];
    input = form.querySelector('input[name="' + name + '"]') || form.querySelector('input[id="' + name + '"]');
    if (input) break;
  }
  if (!input) {
    var inputs = form.querySelectorAll('input[id]');
    inputs.forEach(function(el){
      var label = form.querySelector('label[for="' + el.id + '"]');
      var text = label ? label.textContent.toLowerCase() : '';
      if (!input) {
        var hasTicketNumber = (text.includes('nomor tiket') || text.includes('no tiket') || text.includes('kode tiket') || text.includes('ticket number'));
        var isDateRelated = (text.includes('tanggal') || text.includes('tgl') || text.includes('date'));
        if (hasTicketNumber && !isDateRelated) input = el;
      }
    });
  }
  if (!input) {
    var allInputs = form.querySelectorAll('input');
    allInputs.forEach(function(el){
      if (input) return;
      var n = (el.name || '').toLowerCase();
      var i = (el.id || '').toLowerCase();
      var combined = n + ' ' + i;
      var likelyNumber = ((combined.includes('nomor') || combined.includes('no') || combined.includes('kode')) && combined.includes('tiket'));
      var likelyDate = (combined.includes('tanggal') || combined.includes('tgl') || combined.includes('date'));
      if (likelyNumber && !likelyDate) input = el;
    });
  }
  if (!input) return;
  var oldCopyBtns = form.querySelectorAll('button[title="Salin kode tiket"]');
  oldCopyBtns.forEach(function(b){ b.remove(); });
  var suffixes = form.querySelectorAll('.fi-input-wrp-suffix');
  suffixes.forEach(function(wrp){
    var hasInteractive = wrp.querySelector('.fi-icon-btn, button, svg, a, input, span');
    var inner = wrp.firstElementChild;
    var isEmpty = !hasInteractive && (!inner || inner.children.length === 0);
    if (isEmpty) wrp.remove();
  });
  var wrapper = document.createElement('div');
  wrapper.className = 'flex gap-2';
  input.parentElement.insertBefore(wrapper, input);
  wrapper.appendChild(input);
  input.className = 'copy-input flex-1 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 ' + (input.className || '');
  var btn = document.createElement('button');
  btn.type = 'button';
  btn.className = 'copy-btn inline-flex items-center px-4 py-2 rounded-lg bg-gray-900 text-white dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600';
  btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5 mr-2"><rect x="9" y="9" width="11" height="11" rx="2" ry="2"></rect><rect x="4" y="4" width="11" height="11" rx="2" ry="2"></rect></svg><span>Salin</span>';
  btn.dataset.originalHtml = btn.innerHTML;
  wrapper.appendChild(btn);
  btn.addEventListener('click', function(){
    var value = input.value || input.getAttribute('value') || '';
    var done = function(){
      btn.textContent = 'Tersalin';
      btn.disabled = true;
      setTimeout(function(){
        btn.innerHTML = btn.dataset.originalHtml || 'Salin';
        btn.disabled = false;
      }, 1500);
    };
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(value).then(done).catch(function(){
        var ta = document.createElement('textarea');
        ta.value = value;
        document.body.appendChild(ta);
        ta.select();
        try { document.execCommand('copy'); } catch(e) {}
        document.body.removeChild(ta);
        done();
      });
    } else {
      var ta = document.createElement('textarea');
      ta.value = value;
      document.body.appendChild(ta);
      ta.select();
      try { document.execCommand('copy'); } catch(e) {}
      document.body.removeChild(ta);
      done();
    }
  });
});
</script>
<style>
.dark button[title="Salin kode tiket"]{display:none!important}
.dark input[type="date"],
.dark input[type="datetime-local"],
.dark input[name*="tanggal"],
.dark input[id*="tanggal"]{background-color:#111827;color:#ffffff;border-color:#374151}
.dark input[type="date"]::placeholder{color:#cbd5e1}
.dark input[type="date"]::-webkit-calendar-picker-indicator{filter:invert(1)}
.dark input[type="datetime-local"]::placeholder{color:#cbd5e1}
.dark input[type="datetime-local"]::-webkit-calendar-picker-indicator{filter:invert(1)}
.dark input[type="datetime-local"][readonly]{-webkit-text-fill-color:#ffffff;color:#ffffff}
</style>
</div>
