<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $modelLabel = 'Project';

    protected static ?string $pluralModelLabel = 'Projects';

    protected static ?int $navigationSort = 2;

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function canViewAny(): bool
    {
        return true;
    }

    public static function canView(Model $record): bool
    {
        return true;
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function canEdit(Model $record): bool
    {
        return true;
    }

    public static function canDelete(Model $record): bool
    {
        return true;
    }

    public static function canDeleteAny(): bool
    {
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Project')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Project')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'create') {
                                    $set('slug', Str::slug($state));
                                }
                            })
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Lengkap')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Detail Laporan / Progress')
                    ->schema([
                        Forms\Components\Textarea::make('problem_analysis')
                            ->label('Analisis Masalah')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('system_requirement')
                            ->label('Kebutuhan Sistem')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('architecture')
                            ->label('Arsitektur')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\TagsInput::make('tech_stack')
                            ->label('Tech Stack')
                            ->placeholder('Laravel')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('diagram_path')
                            ->label('Diagram ERD / Flowchart')
                            ->disk('public')
                            ->directory('project-diagrams')
                            ->image()
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Status & Publikasi')
                    ->schema([
                        Forms\Components\TextInput::make('repository_url')
                            ->label('Repository URL')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('demo_url')
                            ->label('Demo URL')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'planning' => 'Planning',
                                'development' => 'Development',
                                'testing' => 'Testing',
                                'done' => 'Done',
                            ])
                            ->default('planning'),

                        Forms\Components\TextInput::make('progress')
                            ->label('Progress')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->default(0)
                            ->required(),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publish'),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Tampilkan di Home')
                            ->default(false),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publish')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('progress')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publish')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'planning' => 'Planning',
                        'development' => 'Development',
                        'testing' => 'Testing',
                        'done' => 'Done',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}