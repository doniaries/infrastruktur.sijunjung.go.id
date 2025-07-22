<?php

namespace App\Livewire;

use App\Models\Jorong;
use App\Models\Nagari;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PublicJorongForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public $jorongId = null;

    public function mount($id = null): void
    {
        $this->jorongId = $id;
        
        if ($this->jorongId) {
            $jorong = Jorong::find($this->jorongId);
            if ($jorong) {
                $this->form->fill($jorong->toArray());
            }
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Form Jorong')
                    ->columnSpanFull()
                    ->description('Silakan isi data Jorong di bawah ini')
                    ->schema([
                        Select::make('nagari_id')
                            ->label('Nagari')
                            ->options(Nagari::pluck('nama_nagari', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('nama_jorong')
                            ->label('Nama Jorong')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nama_kepala_jorong')
                            ->label('Nama Kepala Jorong')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('kontak_kepala_jorong')
                            ->label('Kontak Kepala Jorong')
                            ->required()
                            ->placeholder('081234567890')
                            ->maxLength(20),
                        TextInput::make('luas_jorong')
                            ->label('Luas Jorong (ha)')
                            ->numeric(),
                        TextInput::make('jumlah_penduduk_jorong')
                            ->label('Jumlah Penduduk Jorong')
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

        if (empty($data['nama_jorong']) || empty($data['nagari_id']) || empty($data['nama_kepala_jorong'])) {
            Notification::make()
                ->danger()
                ->title('Validasi Gagal')
                ->body('Silakan isi semua field yang diperlukan')
                ->duration(3000)
                ->send();
            return;
        }

        try {
            if ($this->jorongId) {
                $jorong = Jorong::find($this->jorongId);
                if ($jorong) {
                    $jorong->update($data);
                    $message = 'Data Jorong Berhasil Diperbarui';
                    $body = 'Terima kasih, data Jorong berhasil diperbarui.';
                } else {
                    throw new \Exception('Data Jorong tidak ditemukan');
                }
            } else {
                Jorong::create($data);
                $message = 'Data Jorong Berhasil Disimpan';
                $body = 'Terima kasih, data Jorong berhasil dikirim.';
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
        return view('livewire.public-jorong-form');
    }
}