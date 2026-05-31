<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PortfolioProfileResource\Pages;
use App\Models\PortfolioProfile;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioProfileResource extends Resource
{
    protected static ?string $model = PortfolioProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Profile';

    protected static ?string $modelLabel = 'Profile';

    protected static ?string $pluralModelLabel = 'Profiles';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Foto Profile')
                            ->image()
                            ->directory('portfolio/profile')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('headline')
                            ->label('Headline')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Nomor HP')
                            ->tel()
                            ->maxLength(255),

                        TextInput::make('location')
                            ->label('Lokasi')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Link Profesional')
                    ->schema([
                        TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url()
                            ->maxLength(255),

                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->maxLength(255),

                        TextInput::make('website_url')
                            ->label('Website URL')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(3),

                Section::make('Bio')
                    ->schema([
                        Textarea::make('short_bio')
                            ->label('Bio Singkat')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('bio')
                            ->label('Bio Lengkap')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('Tech Stack Hero')
                    ->description('Data ini tampil di bagian Tech Stack pada hero. Kalau dikosongkan, bagian Tech Stack tidak tampil di website.')
                    ->schema([
                        TagsInput::make('skills')
                            ->label('Tech Stack')
                            ->placeholder('Tambahkan skill, contoh: Laravel')
                            ->suggestions([
                                'Laravel',
                                'Livewire',
                                'Blade',
                                'Filament V3',
                                'MariaDB',
                                'Docker',
                                'GitHub',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Skill Categories')
                    ->description('Data ini tampil di section Tech Expertise. Kalau dikosongkan, bagian skill tidak tampil di website.')
                    ->schema([
                        Repeater::make('skill_categories')
                            ->label('Kategori Skill')
                            ->schema([
                                TextInput::make('icon')
                                    ->label('Icon / Label Pendek')
                                    ->placeholder('BE')
                                    ->helperText('Contoh: BE, FE, DB, TL')
                                    ->required()
                                    ->maxLength(4),

                                TextInput::make('title')
                                    ->label('Judul Kategori')
                                    ->placeholder('Backend')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->placeholder('Jelaskan kemampuan pada kategori ini.')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),

                                TextInput::make('items')
                                    ->label('Daftar Skill')
                                    ->placeholder('Contoh: Laravel, MVC, Eloquent ORM, Filament V3')
                                    ->helperText('Pisahkan setiap skill dengan koma.')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->reorderable()
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('headline')
                    ->label('Headline')
                    ->limit(40)
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolioProfiles::route('/'),
            'create' => Pages\CreatePortfolioProfile::route('/create'),
            'edit' => Pages\EditPortfolioProfile::route('/{record}/edit'),
        ];
    }
}