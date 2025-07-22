<?php

namespace App\Livewire;

use App\Models\Nagari;
use App\Models\Kecamatan;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PublicNagariForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public $nagariId = null;

    public function mount($id = null): void
    {
        $this->nagariId = $id;
        
        if ($this->nagariId) {
            $nagari = Nagari::find($this->nagariId);
            if ($nagari) {
                $this->form->fill($nagari->toArray());
            }
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Form Nagari')
                    ->columnSpanFull()
                    ->description('Silakan isi data Nagari di bawah ini')
                    ->schema([
                        Select::make('kecamatan_id')
                            ->label('Kecamatan')
                            ->options(Kecamatan::pluck('nama', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('nama_nagari')
                            ->label('Nama Nagari')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nama_wali_nagari')
                            ->label('Nama Wali Nagari')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('alamat_kantor')
                            ->label('Alamat Kantor')
                            ->maxLength(255),
                        TextInput::make('kontak_wali_nagari')
                            ->label('Kontak Wali Nagari')
                            ->required()
                            ->placeholder('081234567890')
                            ->maxLength(20),
                        TextInput::make('luas_nagari')
                            ->label('Luas Nagari (ha)')
                            ->numeric(),
                        TextInput::make('jumlah_penduduk')
                            ->label('Jumlah Penduduk')
                            ->numeric(),
                        TextInput::make('jumlah_jorong')
                            ->label('Jumlah Jorong')
                            ->numeric(),
                        TextInput::make('latitude')
                            ->label('Latitude')
                            ->maxLength(50),
                        TextInput::make('longitude')
                            ->label('Longitude')
                            ->maxLength(50),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }

    public function submit()
    {
        $data = $this->form->getState();

        if (empty($data['nama_nagari']) || empty($data['kecamatan_id']) || empty($data['nama_wali_nagari'])) {
            Notification::make()
                ->danger()
                ->title('Validasi Gagal')
                ->body('Silakan isi semua field yang diperlukan')
                ->duration(3000)
                ->send();
            return;
        }

        try {
            if ($this->nagariId) {
                $nagari = Nagari::find($this->nagariId);
                if ($nagari) {
                    $nagari->update($data);
                    $message = 'Data Nagari Berhasil Diperbarui';
                    $body = 'Terima kasih, data Nagari berhasil diperbarui.';
                } else {
                    throw new \Exception('Data Nagari tidak ditemukan');
                }
            } else {
                Nagari::create($data);
                $message = 'Data Nagari Berhasil Disimpan';
                $body = 'Terima kasih, data Nagari berhasil dikirim.';
            }
            
            Notification::make()
                ->success()
                ->title($message)
                ->body($body)
                ->duration(3000)
                ->send();
            $this->form->fill();
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Gagal Menyimpan Data')
                ->body('Terjadi kesalahan pada sistem. Silakan coba lagi nanti.')
                ->duration(3000)
                ->send();
        }
    }

    public function render(): View
    {
        return view('livewire.public-nagari-form');
    }
}